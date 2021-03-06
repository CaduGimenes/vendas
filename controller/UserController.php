<?php

use Model\Page;
use Model\User;
use Model\Order;
use Model\District;

$app->get('/', function(){

    $user = new User();
    $order = new Order();

    $order->deleteSession();
    $user->logout();

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>'',
        'district'=>'',
        'client'=>''
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
        'menu'=>'',
        'client'=>'',
        'district'=>'',
        'districtValues'=>District::listAll()
    ]);

    $page->setTpl('register',[
        'user'=>User::getSession()
    ]);

});

$app->post('/register', function(){

    $user = new User();

    $user->setData($_POST);

    $user->save();

    $user->setSession($user->getValues());

    header("Location: /order/make");
    exit;
});

?>