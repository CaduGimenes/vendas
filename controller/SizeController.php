<?php

use Model\Page;
use Model\Size;

$app->get('/menu/size/create', function(){

    $page = new Page([
        'title'=>'Adicionar Tamanho',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl('addSize');

});

$app->post('/menu/size/create', function(){

    $size = new Size();

    $size->setData($_POST);

    $size->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/size/update/:cd_tamanho', function($cd_tamanho){

    $size = new Size();

    $size->get((int)$cd_tamanho);

    $page = new Page([
        'title'=>'Alterar Tamanho',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("updateSize", [
        'size'=>$size->getValues()
    ]);

});

$app->post('/menu/size/update/:cd_tamanho', function($cd_tamanho){

    $size = new Size();

    $size->get((int)$cd_tamanho);

    $size->setData($_POST);

    $size->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/size/delete/:cd_tamanho', function($cd_tamanho) {

    $size = new Size();

    $size->get((int)$cd_tamanho);

    $size->delete();

    header("Location: /menu");
    exit;

})

?>