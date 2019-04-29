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
 * internally uses url function only need path is after the /app/ directory
 */
function redirect($destination)
{
    header("Location: " . url($destination));
    exit;
}

/**
 * Redirects back to the source page/form
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
