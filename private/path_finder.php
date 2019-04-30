<?php

// Directories path constants
// __DIR__ returns the current path to current directory
// dirname() returns the parent directory of current directory  

define("PRIVATE_PATH", __DIR__);

define("PROJECT_PATH", dirname(PRIVATE_PATH));
// root/models
define("MODELS_PATH", PROJECT_PATH . '/models');
// root/app
define("APP_PATH", PROJECT_PATH . '/app');

// root/resources
define("PUBLIC_PATH", PROJECT_PATH . '/public');

// root/public/assets
define("ASSETS_PATH", PUBLIC_PATH . '/assets');

// root/public/css
define("CSS_PATH", PUBLIC_PATH . '/css');

// root/public/js
define("JS_PATH", PUBLIC_PATH . '/js');


// root/private/shared
define("SHARED_PATH", PRIVATE_PATH . '/shared');




//Find Server root dynamically $_SERVER...
// // // // // // // // // // // // // // // // $pwd = $_SERVER['SCRIPT_NAME'];
// // // // // // // // // // // // // // // // Gets the present working directory
// // // // // // // // // // // // // // // // $pwd = explode('/',$_SERVER['SCRIPT_NAME']);


//Search and finds where /app string is located and store its position
$app_pwd = strpos($_SERVER['SCRIPT_NAME'], '/app') + 4;
//Cuts the string from its start[0] till the app directory end
$domain_root = substr($_SERVER['SCRIPT_NAME'], 0, $app_pwd);
define("WWW_ROOT", $domain_root);
