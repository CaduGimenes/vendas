<?php
    
    Use Model\Page;
    use Model\Client;
    use Model\User;
    use Model\District;
    
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
    
    $app->get("/clients/delete/:cd_cliente", function($cd_cliente){
              
              $cliente = new Client;
              
              $cliente->delete((int)$cd_cliente);
              
              header("Location: /clients");
              exit;
              
              });
    
    $app->get('/clients/update/:cd_cliente', function ($cd_cliente) {
              
              $cliente = new Client;
              
              $cliente->get((int)$cd_cliente);
              
              $page = new Page([
                               'title' => 'Alterar dados',
                               'order' => '',
                               'menu' => '',
                               'client'=>'active',
                               'district'=>''
                               ]);
              
              $page->setTpl('updateAddress2', [
                            'clientData' => $cliente->getValues(),
                            'getDistrict'=>District::listAll()
                            ]);
              
              });
    
    $app->post('/clients/update/:cd_cliente', function ($cd_cliente) {
               
               Client::updateAddress($cd_cliente, $_POST["nm_logradouro"], $_POST["nm_cliente"], $_POST["nr_casa"], $_POST["nm_bloco"], $_POST["cd_bairro"]);
               
               header("Location: /clients");
               exit;
               
               });
