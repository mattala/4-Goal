<?php

function url($script_name)
{
    if ($script_name[0] != '/') {
        $script_name = '/' . $script_name;
    }
    return WWW_ROOT . $script_name;
}
