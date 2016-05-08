<?php

define("DS", DIRECTORY_SEPARATOR);

// định nghĩa các thư mục
define("ROOT_DIR", dirname(__FILE__));
define("APP_DIR", ROOT_DIR . DS . 'application');
define("CONTROLLERS_DIR", APP_DIR . DS . 'constrollers');
define("MODELS_DIR", APP_DIR . DS . 'models');
define("VIEWS_DIR", APP_DIR . DS . 'views');

// autoload các class
require(ROOT_DIR . DS . 'framework' . DS . 'core.php');
Framework\Core::initialize();

// load config
$config = new Framework\Config(array(
    'type' => 'ini'
));
Framework\Registry::set('config', $config->initialize());
unset($config);

// load functions
$functions = new Framework\Functions();
Framework\Registry::set('functions', $functions->initialize());
unset($functions);

// load session
$session = new Framework\Session();
Framework\Registry::set('session', $session);
unset($session);

// load cookie
$cookie = new Framework\Cookie();
Framework\Registry::set('cookie', $cookie);
unset($cookie);

$input = new Framework\Input();
Framework\Registry::set('input', $input);
unset($input);

$validator = new Framework\Validator();
Framework\Registry::set('validator', $validator);
unset($validator);

// load database
$database = new Framework\Database();
Framework\Registry::set('database', $database->initialize());
unset($database);

// load router
$router = new Framework\Router();
Framework\Registry::set('router', $router);
unset($router);

Framework\Registry::get('router')->dispatch();
