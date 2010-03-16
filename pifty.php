<?php
/**
 * Pifty!
 *
 * @author    Simeon F. Willbanks
 * @link      http://github.com/simeonwillbanks/Pifty
 * @license   http://www.apache.org/licenses/LICENSE-2.0.html
 **/
require_once 'config.php';
define('APPLICATION', dirname(__FILE__).'/');
define('MODELS', APPLICATION.'models/');
define('VIEWS', APPLICATION.'views/');
define('CONTROLLERS', APPLICATION.'controllers/');

/**
 * Each Model extends this base class
 *
 * @package Pifty
 **/
class model { 
  /**
   * PDO instance representing a connection to a database
   *
   * @var object
   **/ 
  protected $db; 
  public function __construct() {
    try {
      // PHP Data Objects http://php.net/manual/en/book.pdo.php
      $this->db = new PDO(DB_DSN, DB_USER, DB_PASSWORD, array(PDO::ATTR_PERSISTENT=>TRUE));
    } catch (PDOException $e) {
      error_controller::database_connection();
    }          
  } 
}

/**
 * Views are called statically from Controllers
 *
 * @package Pifty
 **/
class view {
  /**
   * Render a view
   *
   * @var string $path path to view relative from ./pifty/view/
   * @var array $vars variables to be passed to view, key is variable name and value is value
   * @return void
   **/
  public static function render($path, $vars=array()) {
    $view = VIEWS.$path.'.php';
    if (file_exists($view)) {
      // Set array members as local variables and include view
      if (!empty($vars)) extract($vars);
      include_once $view;
    } else {
      error_controller::view_missing($view);
    }
  }
}

/**
 * Controller handles requests, routes and responses
 *
 * @package Pifty
 **/
class controller {
  public static function front() {
    $parts = explode('/', trim($_SERVER['PATH_INFO'], '/'));
    // Default controller is home
    $class = ((!empty($parts[0])) ? array_shift($parts) : 'home').'_controller';
    // Default controller method is index
    $method = (!empty($parts[0])) ? array_shift($parts) : 'index';
    $args = (!empty($parts[0])) ? $parts : array();
    if (!method_exists($class, $method) || call_user_func_array(array($class, $method), $args) === FALSE) {
      error_controller::page_not_found();        
    }
  }
  public static function auto_load($load) {
    list($class, $path) = explode('_', $load);
    $file = APPLICATION.$path.'s/'.$class.'.php';
    if (file_exists($file)) include_once $file;
  }
}

// Autoload models views controllers
spl_autoload_register(array('controller', 'auto_load'));