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

// root/public/style
define("STYLE_PATH", PUBLIC_PATH . '/style');

// root/public/js
define("JS_PATH", PUBLIC_PATH . '/js');


// root/private/shared
define("SHARED_PATH", PRIVATE_PATH . '/shared');
