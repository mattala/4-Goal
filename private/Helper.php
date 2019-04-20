<?php

class Helper
{
    /**
     * Dynamically finds url path
     * @param $script needed script path
     */
    public static function url($script_name)
    {
        if ($script_name[0] != '/') {
            $script_name = '/' . $script_name;
        }
        return APP_PATH . $script_name;
    }
}
