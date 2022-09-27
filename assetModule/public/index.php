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
$config = require ROOT . '/config/config.php';
// NOTE: this namespace will only work in PHP 8 and above
//       in PHP 7, "Object" will be viewed as a keyword and you'll get a syntax error!
use AssetModule\Object\Equipment;
use AssetModule\Db\Db;

$test = new Equipment("test equipment", 1, "Here's a description", "Outside");
echo $test . '<br>';

var_dump($test->__serialize());

$id = $_GET['state_id'] ?? 'NY';
$id = strip_tags(trim($id));
$db = new Db($config);
var_dump($db->findNumber($id));
