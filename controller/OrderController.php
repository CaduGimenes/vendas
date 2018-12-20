<?php

use Model\Complement;
use Model\Fruit;
use Model\Order;
use Model\Page;
use Model\PrintOut;
use Model\Size;
use Model\Syrup;
use Model\User;

$app->get('/order/make', function () {

    User::verifyLogin();

    $fruit = Fruit::listAll();
    $size = Size::listAll();
    $syrup = Syrup::listAll();
    $complement = Complement::listAll();

    $page = new Page([
        'title' => 'Pedido',
        'order' => 'active',
        'menu' => '',
    ]);

    $page->setTpl("order", [
        'fruit' => $fruit,
        'size' => $size,
        'syrup' => $syrup,
        'complement' => $complement,
        'user' => User::getSession(),
    ]);

});

$app->post('/order/make', function () {

    $order = new Order();

    $order->createSession($_POST);

    header("Location: /order/confirm");
    exit;

});

$app->get('/order/confirm', function () {

    User::verifyLogin();

    $order = new Order();

    $page = new Page([
        'title' => 'Confirmar Pedido',
        'order' => 'active',
        'menu' => '',
        'total' => $order->getTotal(),
        'orders' => $order->getOrders(),
    ]);

    $page->setTpl('orderConfirm', [
        'user' => User::getSession(),
    ]);

});

$app->post('/order/confirm', function () {

    User::verifyLogin();

    $order = new Order();

    $printOut = new PrintOut();

    $order->save();

    $printOut->printOrder();

});

$app->get('/order/information', function () {

    User::verifyLogin();

    $page = new Page([
        'title' => 'Confirmar informações',
        'order' => 'active',
        'menu' => '',
    ]);

    $page->setTpl('userInformation', [
        'user' => User::getSession(),
    ]);

});

$app->get('/order/update/address', function () {

    User::verifyLogin();

    $page = new Page([
        'title' => 'Alterar endereço',
        'order' => 'active',
        'menu' => '',
    ]);

    $page->setTpl('updateAddress', [
        'user' => User::getSession(),
    ]);

});

$app->post('/order/update/address', function () {

    $user = new User();

    $user->setData($_POST);

    $user->updateAddress();

    header("Location: /order/make");
    exit;

});
