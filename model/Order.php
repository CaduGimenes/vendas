<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Order extends Model{

    const SESSION_DATA = "Order Data";

    public function save($data = array(), $clientId){

        $number = count($data["pedido"]);

        $this->checkValues($data);

        $sql = new Sql();

        $_SESSION[Order::SESSION_DATA] = $data;

        for ($i=0; $i < $number; $i++) { 
            
            if(!empty($data['pedido']) && $data['pedido'] != '') {

                $size = implode(',', $data['tamanho'.$i]);
                $fruit = implode(',', $data['frutas'.$i]);
                $syrup = implode(',', $data['caldas'.$i]);
                $complement = implode(',', $data['complemento'.$i]);

                $results = $sql->select('CALL sp_order_save(:ds_tamanho, :ds_fruta, :ds_calda, :ds_complemento, :vl_total, :cd_cliente)',[
                    ':ds_tamanho'=>$size,
                    ':ds_fruta'=>$fruit,
                    ':ds_calda'=>$syrup,
                    ':ds_complemento'=>$complement,
                    ':vl_total'=>0,
                    ':cd_cliente'=>(int)$clientId
                ]);
                $this->setData($results[0]);

            }

        }
        
    }

    private function checkValues($data = array()){

        $number = count($data["pedido"]);

        for ($i=0; $i < $number; $i++) { 

            if(empty($data['frutas'.$i][$i]) || $data['frutas'.$i][$i] === null) $data['frutas'.$i][$i] = '';
            if(empty($data['caldas'.$i][$i]) || $data['caldas'.$i][$i] === null) $data['caldas'.$i][$i] = '';
            if(empty($data['complemento'.$i][$i]) || $data['complemento'.$i][$i] === null) $data['complemento'.$i][$i] = '';
        
        }


        

    }

}

?>