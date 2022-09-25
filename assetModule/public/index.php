<?php

use AssetModule\Object\Equipment;

//start session() ?

spl_autoload_register(function ($class) {
    $class = __DIR__ . '/../src/' . str_replace('\\', '/', $class);
    require_once $class . '.php';
});

$test = new Equipment("test equipment", 1, "Here's a description", "Outside");
echo $test . '<br>';

var_dump($test->__serialize());
