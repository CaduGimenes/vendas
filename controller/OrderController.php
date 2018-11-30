<?php

use Model\Complement;
use Model\Fruit;
use Model\Order;
use Model\Page;
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
        'user' => $_SESSION[User::SESSION],
    ]);

});

$app->post('/order/make', function () {

    $id = $_SESSION[User::SESSION]['cd_cliente'];

    $order = new Order();

    $order->save($_POST, $id);

    header("Location: /order/confirm");
    exit;

});

$app->get('/order/confirm', function () {

    echo "<pre>";
    print_r($_SESSION[Order::SESSION_DATA]);
    echo "</pre>";

    User::verifyLogin();

    $order = new Order();

    $order->getTotal();

    $page = new Page([
        'title' => 'Confirmar Pedido',
        'order' => 'active',
        'menu' => '',
    ]);

    $page->setTpl('orderConfirm', [
        'user' => $_SESSION[User::SESSION],
    ]);

});

$app->get('/order/information', function () {

    User::verifyLogin();

    $page = new Page([
        'title' => 'Confirmar informações',
        'order' => 'active',
        'menu' => '',
    ]);

    $page->setTpl('userInformation', [
        'user' => $_SESSION[User::SESSION],
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
        'user' => $_SESSION[User::SESSION],
    ]);

});

$app->post('/order/update/address', function () {

    $user = new User();

    $user->setData($_POST);

    $user->updateAddress($_SESSION[User::SESSION]['cd_cliente']);

    header("Location: /order/make");
    exit;

});
