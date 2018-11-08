<?php

use Model\Page;
use Model\User;

$app->get('/', function(){

    User::logout();

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl('index');

});

$app->post('/', function(){

    $user = new User();

    $user->login($_POST['nr_celular']);
    exit;

});

$app->get('/register', function(){

    $page = new Page([
        'title'=>'Cadastro',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl('register',[
        'user'=>$_SESSION[User::SESSION]
    ]);

});

$app->post('/register', function(){

    $user = new User();

    $user->setData($_POST);

    $user->save();

    $_SESSION[User::SESSION] = $user->getValues();

    header("Location: /order");
    exit;
});

?>