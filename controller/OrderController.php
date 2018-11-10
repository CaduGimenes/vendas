<?php

use Model\Page;
use Model\Fruit;
use Model\Size;
use Model\Syrup;
use Model\Complement;
use Model\IceCream;
use Model\Order;
use Model\User;

$app->get('/order/make', function(){

    User::verifyLogin();

    $fruit = Fruit::listAll();
    $size = Size::listAll();
    $syrup = Syrup::listAll();
    $complement = Complement::listAll();
    $iceCream = IceCream::listAll();

    $page = new Page([
        'title'=>'Pedido',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl("order", [
        'fruit'=>$fruit,
        'size'=>$size,
        'syrup'=>$syrup,
        'complement'=>$complement,
        'icecream'=>$iceCream,
        'user'=>$_SESSION[User::SESSION]
    ]);

});

$app->post('/order/make', function(){

    $id = $_SESSION[User::SESSION]['cd_cliente'];

    $order = new Order();

    $order->save($_POST, $id);

    header("Location: /order/confirm");
    exit;

});

$app->get('/order/information', function(){

    $page = new Page([
        'title'=>'Confirmar informações',
        'order'=>'active',
        'menu'=>''
    ]);

    $page->setTpl('userInformation',[
        'user'=>$_SESSION[User::SESSION]
    ]);

});

?>