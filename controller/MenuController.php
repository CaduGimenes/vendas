<?php

use Model\Page;
use Model\Fruit;
use Model\Size;
use Model\Syrup;
use Model\Complement;
use Model\User;

$app->get('/menu', function(){

    $user = new User;

    $user->logout();

    $fruit = Fruit::listAll();
    $size = Size::listAll();
    $syrup = Syrup::listAll();
    $complement = Complement::listAll();

    $page = new Page([
        'title'=>'Cardápio',
        'order'=>'',
        'menu'=>'active',
        'client'=>'',
        'district'=>''
    ]);

    $page->setTpl("menu",[
        'fruit'=>$fruit,
        'size'=>$size,
        'syrup'=>$syrup,
        'complement'=>$complement,
    ]);

});

?>