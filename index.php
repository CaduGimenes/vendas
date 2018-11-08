<?php

session_start();
require_once("vendor/autoload.php");

use Slim\Slim;

$app = new Slim();

require_once("dist".DIRECTORY_SEPARATOR."functions".DIRECTORY_SEPARATOR."functions.php");
require_once("controller".DIRECTORY_SEPARATOR."OrderController.php");
require_once("controller".DIRECTORY_SEPARATOR."HomeController.php");
require_once("controller".DIRECTORY_SEPARATOR."FruitController.php");
require_once("controller".DIRECTORY_SEPARATOR."SizeController.php");
require_once("controller".DIRECTORY_SEPARATOR."SyrupController.php");
require_once("controller".DIRECTORY_SEPARATOR."ComplementController.php");
require_once("controller".DIRECTORY_SEPARATOR."IceCreamController.php");
require_once("controller".DIRECTORY_SEPARATOR."UserController.php");

$app->run();



?>