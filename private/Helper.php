<?php

/** 
 * returns the full valid path to a script starting from www_root/app/...  
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
 * current page is active.
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
 */
function active_page($script_name)
{
    if (is_active($script_name))
        echo 'active';
}

/**
 * @return void clears session errors
 */
function clear_errors()
{
    if (isset($_SESSION['errors']))
        unset($_SESSION['errors']);
}

/**
 * @return void dump&die will var_dump and stop script execution
 */
function dd($getting_dumped)
{
    var_dump($getting_dumped);
    die();
}
