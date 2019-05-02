<?php

/** 
 * @return string the full valid path to a script starting from fourgoal/app/...  
 */
function url($script_name)
{
    if ($script_name[0] != '/') {
        $script_name = '/' . $script_name;
    }
    return WWW_ROOT . $script_name;
}
/**
 * changes header location and exit executing
 * internally uses url function for /app/ directory
 */
function redirect($destination)
{
    if (strpos($destination, '.php') == NULL) {
        $destination = $destination . '.php';
    }
    header("Location: " . url($destination));
    exit;
}

/**
 * @return void Redirects back to the source page || form
 */
function back()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

/**
 * @return bool page is active
 */
function is_active($script_name)
{
    if (strpos($script_name, '.php') == NULL) {
        $script_name = $script_name . '.php';
    }
    return $_SERVER['SCRIPT_NAME'] == url($script_name);
}

/**
 * a wrapper for your wrapper to wrap while you are wrapping.
 * @return string echoed {{ active }}
 */
function active_page($script_name)
{
    if (is_active($script_name))
        echo 'active';
}

/**
 * @return void clears session errors and warnings
 */
function clear_errors()
{
    if (isset($_SESSION['errors']) || isset($_SESSION['warnings'])) {
        unset($_SESSION['errors']);
        unset($_SESSION['warnings']);
    }
}

/**
 * @return void dump&die will var_dump and stop script execution
 */
function dd($getting_dumped)
{
    var_dump($getting_dumped);
    die();
}



/**
 * Handles URL manipulation
 * @return bool check if the reference url is correct | Internally uses url()
 */
function is_from($script_name)
{
    //Get Reference url from $_SERVER GLOBAL VAR
    $ref = $_SERVER['HTTP_REFERER'];
    //Get URL to be matched
    // /app/$script_name
    $double_check = url($script_name);
    //Get the position where the /fourgoal/ string starts
    $start_at = strpos($ref, '/fourgoal');
    //Cut the URL starting from -> end of string
    $generic_link = substr($ref, $start_at, strlen($ref));
    //Bool expression
    return $generic_link === $double_check;
}
/**
 * Alias function to $_SESSION['key']
 * @param $session_var_name has to be a string as all session keys are.
 * @return string session variable
 */
function session(String $session_var_name)
{
    return $_SESSION[$session_var_name];
}
