<?php

namespace Model;

use Model\Sql;
use Model\Model;
use Model\User;

class Order extends Model
{

    const SESSION_DATA = "Order Data";
    const SESSION_TOTAL = "";

    public function createSession($session = array()){

        $_SESSION[Order::SESSION_DATA] = $session;

    }

    public function getSession(){

        return $_SESSION[Order::SESSION_DATA];

    }

    public function deleteSession(){

        $_SESSION[Order::SESSION_TOTAL] = null;

    }

    public function save()
    {

        $data = $this->getSession();

        $clientId = $_SESSION[User::SESSION]['cd_cliente'];

        $number = count($data["pedido"]);

        $this->checkValues($data, $number, $clientId);

    }

    public function checkValues($data = array(), $orderNumber, $clientId)
    {

        $sql = new Sql();

        for ($i = 0; $i < $orderNumber; $i++) {

            if (empty($data['frutas' . $i][$i]) || $data['frutas' . $i][$i] === null) {
                $data['frutas' . $i][$i] = '';
            }

            if (empty($data['caldas' . $i][$i]) || $data['caldas' . $i][$i] === null) {
                $data['caldas' . $i][$i] = '';
            }

            if (empty($data['complemento' . $i][$i]) || $data['complemento' . $i][$i] === null) {
                $data['complemento' . $i][$i] = '';
            }

            if (!empty($data['pedido']) && $data['pedido'] != '') {

                $size = implode(',', $data['tamanho' . $i]);
                $fruit = implode(',', $data['frutas' . $i]);
                $syrup = implode(',', $data['caldas' . $i]);
                $complement = implode(',', $data['complemento' . $i]);

                $results = $sql->select('CALL sp_order_save(:ds_tamanho, :ds_fruta, :ds_calda, :ds_complemento, :vl_total, :cd_cliente)', [
                    ':ds_tamanho' => utf8_encode($size),
                    ':ds_fruta' => utf8_encode($fruit),
                    ':ds_calda' => utf8_encode($syrup),
                    ':ds_complemento' => utf8_encode($complement),
                    ':vl_total' => 0,
                    ':cd_cliente' => (int) $clientId,
                ]);
                $this->setData($results[0]);

            }

        }

    }

    public function getTotal()
    {

        $data = $this->getSession();

        $sql = new Sql();

        $count = count($data["pedido"]);

        $total = 0;

        $results = [];

        for ($i = 0; $i < $count; $i++) {

            $resultQuery = $sql->select("SELECT vl_tamanho FROM tb_tamanho WHERE nm_tamanho = :nm_tamanho", [
                ':nm_tamanho' => $data["tamanho" . $i][0]
            ]);

            array_push($results, $resultQuery[0]);

        }

        foreach($results as $item){

            $total += $item['vl_tamanho'];

        }

        $_SESSION[Order::SESSION_TOTAL] = (float)$total;
        return $total;

    }

}
