<?php

use Model\Page;
use Model\Fruit;
use Model\Size;
use Model\Syrup;
use Model\Complement;
use Model\IceCream;

$app->get('/menu', function(){

    $fruit = Fruit::listAll();
    $size = Size::listAll();
    $syrup = Syrup::listAll();
    $complement = Complement::listAll();
    $iceCream = IceCream::listAll();

    $page = new Page([
        'title'=>'Cardápio',
        'order'=>'',
        'menu'=>'active'
    ]);

    $page->setTpl("menu",[
        'fruit'=>$fruit,
        'size'=>$size,
        'syrup'=>$syrup,
        'complement'=>$complement,
        'icecream'=>$iceCream
    ]);

});

?>