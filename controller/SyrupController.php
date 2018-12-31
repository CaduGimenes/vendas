<?php

use Model\Page;
use Model\Syrup;

$app->get('/menu/syrup/create', function(){

    $page = new Page([
        'title'=>'Adicionar Calda',
        'order'=>'',
        'menu'=>'active',
        'client'=>'',
        'district'=>''
    ]);

    $page->setTpl("addSyrup");

});

$app->post('/menu/syrup/create', function(){

    $syrup = new Syrup();

    $syrup->setData($_POST);

    $syrup->save();
    
    header("Location: /menu");
    exit;

});

$app->get('/menu/syrup/update/:cd_calda', function($cd_calda){

    $syrup = new Syrup();

    $syrup->get((int)$cd_calda);

    $page = new Page([
        'title'=>'Alterar calda',
        'order'=>'',
        'menu'=>'active',
        'client'=>'',
        'district'=>''
    ]);

    $page->setTpl("updateSyrup", [
        'syrup'=>$syrup->getValues()
    ]);

});

$app->post('/menu/syrup/update/:cd_calda', function($cd_calda){

    $syrup = new Syrup();

    $syrup->get((int)$cd_calda);

    $syrup->setData($_POST);

    $syrup->save();

    header("Location: /menu");
    exit;

});

$app->get('/menu/syrup/delete/:cd_calda', function($cd_calda) {

    $syrup = new Syrup;

    $syrup->get((int)$cd_calda);

    $syrup->delete();

    header("Location: /menu");
    exit;

});




?>