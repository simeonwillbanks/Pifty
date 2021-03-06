INTRODUCTION
============
**Pifty** is a small and nifty PHP web framework. **Pifty** implements the Model-View-Controller architecture pattern. The Models extend PHP's built-in Data Objects (PDO), so a variety of databases are supported. Essentially, the Views are PHP includes. The Controllers handle requests, routing and responses.

**Pifty** is a featureless PHP web framework. It strives to remain as small as possible while still adhering to MVC. If you'd like a feature complete PHP web framework, there are [many available](http://www.phpframeworks.com/). Will **Pifty** ever run an enterprise level web site? Probably not. However, **Pifty** is perfect for small web sites such as personal portals. Pifty is easy to use. You can have Pifty up and running quickly. **Pifty** is nifty.

REQUIREMENTS
------------  
*   PHP 5.x
*   Apache 1.x/2.x
    *   mod_rewrite must be enabled
    *   a `<Directory>` section for _./Pifty/public_ must have `AllowOverride` set to `All` for the _./Pifty/public/.htaccess_ file to be read
        * More info on [mod_rewrite](http://httpd.apache.org/docs/2.2/mod/mod_rewrite.html) and [.htaccess](http://httpd.apache.org/docs/2.2/howto/htaccess.html)
    
INSTALLATION
------------  
1.  Open _./Pifty/config.php_
    *   Set database DSN, username and password
    *   If you find the need, _./Pifty/config.php_ is for application constants
2.  Make _./Pifty/config.php_ the path to your public web root
3.  Navigate to your web site in a browser   

WIKI
---- 
[GitHub](http://wiki.github.com/simeonwillbanks/Pifty/)

LICENSE
-------  
[Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0.html)