<?php

use Model\Page;
use Model\Complement;

$app->get('/menu/complement/create', function(){

    $page = new Page([
        'title'=>'Adicionar Complemento',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("addComplement");

});

$app->post('/menu/complement/create', function(){

    $complement = new Complement();

    $complement->setData($_POST);

    $complement->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/complement/update/:cd_complement', function($cd_complement){

    $complement = new Complement();

    $complement->get((int)$cd_complement);

    $page = new Page([
        'title'=>'Alterar Complemento',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("updateComplement",[
        'complement'=>$complement->getValues()
    ]);

});

$app->post('/menu/complement/update/:cd_complement', function($cd_complement){

    $complement = new Complement();

    $complement->get((int)$cd_complement);

    $complement->setData($_POST);

    $complement->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/complement/delete/:cd_complement', function($cd_complement){

    $complement = new Complement();

    $complement->get((int)$cd_complement);

    $complement->delete();

    header("Location: /menu");
    exit;

});



?>