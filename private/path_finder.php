<?php

// Directories path constants
// __DIR__ returns the current path to current directory
// dirname() returns the parent directory of current directory  

define("PRIVATE_PATH", __DIR__);

define("PROJECT_PATH", dirname(PRIVATE_PATH));

define("MODELS_PATH", PROJECT_PATH . '/models');
