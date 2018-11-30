<?php

namespace Model;

use Model\Model;
use Model\Sql;

class Order extends Model
{

    const SESSION_DATA = "Order Data";

    public function save($data = array(), $clientId)
    {

        $number = count($data["pedido"]);

        $_SESSION[Order::SESSION_DATA] = $data;

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

        $data = $_SESSION[Order::SESSION_DATA];

        $sql = new Sql();

        $count = count($data["pedido"]);

        for ($i = 0; $i < $count; $i++) {

            $results = $sql->select("SELECT * FROM tb_tamanho WHERE nm_tamanho = :nm_tamanho", [
                ':nm_tamanho' => $data["tamanho" . $i][0]
            ]);

            print_r($results[0])

        }

    }

}
