<?php 

class helper{
    /**
     * Dynamically finds url path
     * @param $script needed script path
     */
    public static function url($script){
        //Missing / at the beginning
        if ($script[0] !== '/') {
            $script = '/' . $script;
        }
        return WWW_ROOT . $script;
    }
    /**
     * Simplified header function
     */
    public static function redirect($location){
        header("Location: " . $location);
        exit;
    }
    /**
     * Shorthand for request header status
     */
    public static function is_post_request(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    /**
    * Shorthand for request header status
    */
    public static function is_get_request(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}