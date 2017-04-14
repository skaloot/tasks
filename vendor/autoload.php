<?php

function __autoload($class) {
    $filename = "./app/".$class.".php";
    include_once($filename);
}
