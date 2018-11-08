<?php

use Model\Page;
use Model\IceCream;

$app->get('/menu/icecream/create', function(){

    $page = new Page([
        'title'=>'Adicionar Sorvete',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl('addIceCream');

});

$app->post('/menu/icecream/create', function(){

    $iceCream = new IceCream();

    $iceCream->setData($_POST);
    
    $iceCream->save();

});

?>