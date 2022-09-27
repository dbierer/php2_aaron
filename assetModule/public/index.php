<?php



//start session() ?

define('ROOT', realpath(__DIR__ . '/..'));

//Print ROOT
//echo ROOT . '<br>';

spl_autoload_register(function ($class) {
    $file = '/src/' . str_replace('\\', '/', $class);
    require_once ROOT . $file . '.php';
    // Print files
    // echo $file . '<br>';
});

use AssetModule\Object\Equipment;


$test = new Equipment("test equipment", 1, "Here's a description", "Outside");
echo $test . '<br>';

var_dump($test->__serialize());
