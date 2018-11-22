<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Order extends Model{

    const SESSION_DATA = "Order Data";
    const SESSION_HTML = "HTML";

    public function save($data = array(), $clientId){

        $number = count($data["pedido"]);

        $sql = new Sql();

        $_SESSION[Order::SESSION_DATA] = $data;

        for ($i=0; $i < $number; $i++) { 
            
            if(empty($data['frutas'.$i][$i]) || $data['frutas'.$i][$i] === null) $data['frutas'.$i][$i] = '';
            if(empty($data['caldas'.$i][$i]) || $data['caldas'.$i][$i] === null) $data['caldas'.$i][$i] = '';
            if(empty($data['complemento'.$i][$i]) || $data['complemento'.$i][$i] === null) $data['complemento'.$i][$i] = '';
            if(empty($data['sorvete'.$i][$i]) || $data['sorvete'.$i][$i] === null) $data['sorvete'.$i][$i] = '';
            if(empty($data['bola'.$i][$i]) || $data['bola'.$i][$i] === null) $data['bola'.$i][$i] = '';
            if(empty($data['meioAMeio'.$i][$i]) || $data['meioAMeio'.$i][$i] === null) $data['meioAMeio'.$i][$i] = '';
            if(empty($data['inteiro'.$i][$i]) || $data['inteiro'.$i][$i] === null) $data['inteiro'.$i][$i] = '';

            if(!empty($data['pedido']) && $data['pedido'] != '') {

                $size = implode(',', $data['tamanho'.$i]);
                $fruit = implode(',', $data['frutas'.$i]);
                $syrup = implode(',', $data['caldas'.$i]);
                $complement = implode(',', $data['complemento'.$i]);
                $iceCream = implode(',', $data['sorvete'.$i]);
                $ball = implode(',', $data['bola'.$i]);
                $middle = implode(',', $data['meioAMeio'.$i]);
                $integer = implode(',', $data['inteiro'.$i]);

                if($integer === "0" || $integer === 0) $integer = "";
                if($ball === ",") $ball = "";

                $results = $sql->select('CALL sp_order_save(:ds_tamanho, :ds_fruta, :ds_calda, :ds_complemento, :ds_sorvete, :nr_bola, :nm_inteiro, :nm_meioameio, :vl_total, :cd_cliente)',[
                    ':ds_tamanho'=>$size,
                    ':ds_fruta'=>$fruit,
                    ':ds_calda'=>$syrup,
                    ':ds_complemento'=>$complement,
                    ':ds_sorvete'=>$iceCream,
                    ':nr_bola'=>$ball,
                    ':nm_inteiro'=>$integer,
                    ':nm_meioameio'=>$middle,
                    ':vl_total'=>'',
                    ':cd_cliente'=>(int)$clientId
                ]);
                $this->setData($results[0]);

            }

            $_SESSION[Order::SESSION_HTML] .= '<div class="nav-tabs-custom"><ul class="nav nav-tabs"><li><a href="#order'.$i.'" data-toggle="tab">Pedido '.($i + 1).'</a></li>';

        }
        
    }

    public static function unsetSession(){

        $_SESSION[Order::SESSION_HTML] = null;

    }

}

?>