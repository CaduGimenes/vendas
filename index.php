<?php

require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

require_once("controller".DIRECTORY_SEPARATOR."HomeController.php");
require_once("controller".DIRECTORY_SEPARATOR."FruitController.php");

$app->run();

?>