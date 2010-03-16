<?php
class error_controller {
  public function database_connection() {
    header($_SERVER['SERVER_PROTOCOL'].' 503 Service Unavailable');
    view::render('error/database_connection');
  }
  public function view_missing($view) {
    header($_SERVER['SERVER_PROTOCOL'].' 500 Internal Server Error');
    view::render('error/view_missing', array('view', $view));
  }  
  public function page_not_found() {
    header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
    view::render('error/page_not_found');
  } 
}