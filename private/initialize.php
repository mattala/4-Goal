<?php    
    // Directories path constants
    // dirname() returns the path to current directory  
    // __FILE__ returns the current path to file
    define("PRIVATE_PATH", dirname(__FILE__));

    define("PROJECT_PATH", dirname(PRIVATE_PATH));

    define("PUBLIC_PATH", PROJECT_PATH . '/public');

    define("SHARED_PATH", PRIVATE_PATH . '/shared');
    //Dynamically finding site root

    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;

    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0,$public_end);
    //Public directory root
    define("WWW_ROOT",$doc_root);
    //Needed scripts
    require_once('db_credentials.php');
    require_once('helper.php');