<?php

use Model\Page;
use Model\Fruit;

$app->get('/', function(){

    $fruit = Fruit::listAll();

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl("index", [
        'fruit'=>$fruit
    ]);


});

$app->get('/menu', function(){

    $fruit = Fruit::listAll();

    $page = new Page([
        'title'=>'Cardápio',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("menu",[
        'fruit'=>$fruit
    ]);

});

?>