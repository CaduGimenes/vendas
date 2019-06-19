<?php
    
    use Model\Complement;
    use Model\Fruit;
    use Model\Order;
    use Model\Page;
    use Model\PrintOut;
    use Model\Size;
    use Model\Syrup;
    use Model\User;
    use Model\District;
    
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
                               'client'=>'',
                               'district'=>''
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
                               'client'=>'',
                               'district'=>''
                               ]);
              
              $page->setTpl('orderConfirm', [
                            'user' => User::getSession(),
                            'total' => $order->getTotal(),
                            'orders' => $order->getOrders()
                            ]);
              
              });
    
    $app->post('/order/confirm', function () {
               
               User::verifyLogin();
               
               $order = new Order();
               
               //$printOut = new PrintOut();
               
               $order->save();
               
               $page = new Page([
                                'title' => 'Pedido confirmado',
                                'order' => 'active',
                                'menu' => '',
                                'client'=>'',
                                'district'=>''
                                ]);
               
               $page->setTpl('orderConfirmed', [
                             'user' => User::getSession(),
                             'total' => $order->getTotal(),
                             'orders' => $order->getOrders(),
                             'paymentMethod' => $_POST["paymentMethod"],
                             'changeValue' => $_POST["changeValue"],
                             ]);
               //$printOut->printOrder($_POST['paymentMethod']);
               
               });
    
    $app->get('/order/information', function () {
              
              User::verifyLogin();
              
              $page = new Page([
                               'title' => 'Confirmar informações',
                               'order' => 'active',
                               'menu' => '',
                               'client'=>'',
                               'district'=>''
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
                               'client'=>'',
                               'district'=>''
                               ]);
              
              $page->setTpl('updateAddress', [
                            'user' => User::getSession(),
                            'getDistrict'=>District::listAll()
                            ]);
              
              });
    
    $app->post('/order/update/address', function () {
               
               $user = new User();
               
               $user->setData($_POST);
               
               $user->updateAddress();
               
               header("Location: /order/make");
               exit;
               
               });
