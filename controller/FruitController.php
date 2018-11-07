<?php

use Model\Page;
use Model\Fruit;

$app->get('/menu/fruit/create', function(){

    $page = new Page([
        'title'=>'Adicionar fruta',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("addFruit");

});

$app->post('/menu/fruit/create', function(){

    $fruit = new Fruit();

    $fruit->setData($_POST);

    $fruit->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/fruit/update/:cd_fruta', function($cd_fruta) {

    $fruit = new Fruit();

    $fruit->get((int)$cd_fruta);

    $page = new Page([
        'title'=>'Alterar fruta',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("updateFruit",[
        'fruit'=>$fruit->getValues()
    ]);

});

$app->post('/menu/fruit/update/:cd_fruta', function($cd_fruta){

    $fruit = new Fruit();

    $fruit->get((int)$cd_fruta);

    $fruit->setData($_POST);

    $fruit->save();

    header("Location: /menu");
    exit;

});

$app->get("/menu/fruit/delete/:cd_fruta", function($cd_fruta){

    $fruit = new Fruit();

    $fruit->get((int)$cd_fruta);

    $fruit->delete();

    header("Location: /menu");
    exit;

});

?>