<?php

Use Model\Page;
use Model\Client;
use Model\User;

$app->get('/clients', function(){

    $user = new User;

    $user->logout();

    $page = new Page([
        'title'=>"Clientes",
        'order'=>'',
        'menu'=>'',
        'district'=>'',
        'client'=>'active',
        'clientList'=>Client::listAll()
    ]);

    $page->setTpl('client');

});