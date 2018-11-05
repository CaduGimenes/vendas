<?php

require_once("vendor/autoload.php");

use Slim\Slim;
use Model\Page;


$app = new Slim();

$app->get('/', function(){

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl("index");


});

$app->get('/menu', function(){

    $page = new Page([
        'title'=>'Cardápio',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("menu");

});

$app->run();

?>