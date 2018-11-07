<?php

use Model\Page;
use Model\Fruit;
use Model\Size;

$app->get('/', function(){

    $fruit = Fruit::listAll();
    $size = Size::listAll();

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl("index", [
        'fruit'=>$fruit,
        'size'=>$size
    ]);


});

$app->get('/menu', function(){

    $fruit = Fruit::listAll();
    $size = Size::listAll();

    $page = new Page([
        'title'=>'Cardápio',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("menu",[
        'fruit'=>$fruit,
        'size'=>$size
    ]);

});

?>