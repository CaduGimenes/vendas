<?php

use Model\Page;
use Model\Fruit;
use Model\Size;
use Model\Syrup;
use Model\Complement;
use Model\IceCream;
use Model\Order;
use Model\User;

$app->get('/order', function(){

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

?>