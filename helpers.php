<?php

if(!function_exists('config')) {
    function config($name, $default="") {
        try {
            $keys = explode(".", $name);
            $result = require('config.php');
            foreach ($keys as $key) {
                $result = &$result[$key];
            }
            return $result;
        } catch (\Exception $e) {
            return $default;
        }
    }
}

if(!function_exists('view')) {
    function view($file, $data=[])
    {
        ob_start();
        $file = str_ireplace('.', '/', $file);
        $filename = "views/".$file.".php";
        require_once($filename);
        $var=ob_get_contents();
        ob_end_clean();
        echo $var;
    }
}