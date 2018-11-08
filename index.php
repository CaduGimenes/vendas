<?php

require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

require_once("dist".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."functions.php");
require_once("controller".DIRECTORY_SEPARATOR."HomeController.php");
require_once("controller".DIRECTORY_SEPARATOR."FruitController.php");
require_once("controller".DIRECTORY_SEPARATOR."SizeController.php");
require_once("controller".DIRECTORY_SEPARATOR."SyrupController.php");
require_once("controller".DIRECTORY_SEPARATOR."ComplementController.php");

$app->run();

?>