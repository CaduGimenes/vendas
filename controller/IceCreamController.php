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

    header("Location: /menu");
    exit;

});

$app->get('/menu/icecream/update/:cd_sorvete', function($cd_sorvete){

    $iceCream = new IceCream();

    $iceCream->get((int)$cd_sorvete);

    $page = new Page([
        'title'=>'Alterar Sorvete',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("updateIceCream",[
        'icecream'=>$iceCream->getValues()
    ]);

});

$app->post('/menu/icecream/update/:cd_sorvete', function($cd_sorvete){

    $iceCream = new IceCream();

    $iceCream->get((int)$cd_sorvete);

    $iceCream->setData($_POST);

    $iceCream->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/icecream/delete/:cd_sorvete', function($cd_sorvete){

    $iceCream = new IceCream();

    $iceCream->get((int)$cd_sorvete);

    $iceCream->delete();

    header("Location: /menu");
    exit;

});

?>