<?php

use Model\Page;
use Model\District;

$app->get('/district', function(){
    
    $page = new Page([
        'title'=>'Bairros',
        'order'=>'',
        'menu'=>'',
        'district'=>'active',
        'client'=>'',
        'districtList'=>District::listAll()
    ]);

    $page->setTpl('district');

});

$app->get('/district/create', function(){

    $page = new Page([
        'title'=>'Cadastrar Bairro',
        'order'=>'',
        'menu'=>'',
        'district'=>'active',
        'client'=>''
    ]);

    $page->setTpl('addDistrict');

});

$app->post('/district/create', function(){

    $district = new District();

    $district->setData($_POST);

    $district->save();

    header("Location: /district");
    exit;

});

$app->get('/district/update/:cd_bairro', function($cd_bairro){

    $district = new District();

    $district->get((int)$cd_bairro);

    $page = new Page([
        'title'=>'Alterar Bairro',
        'order'=>'',
        'menu'=>'',
        'client'=>'',
        'district'=>'active'
    ]);

    $page->setTpl('updateDistrict',[
        'district'=>$district->getValues()
    ]);

});

$app->post('/district/update/:cd_bairro', function($cd_bairro){

    $district = new District();

    $district->get((int)$cd_bairro);

    $district->setData($_POST);

    $district->save();

    header('Location: /district');
    exit;

});

$app->get("/district/delete/:cd_bairro", function($cd_bairro){

    $district = new District();

    $district->get((int)$cd_bairro);

    $district->delete();

    header("Location: /district");
    exit;

});