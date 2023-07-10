<?php

namespace Controllers;

class Controller {
    function view($file, $data=[])
    {
        ob_start();
        $filename = "views/".$file.".php";
        require_once($filename);
        $var=ob_get_contents();
        ob_end_clean();
        echo $var;
    }
}
