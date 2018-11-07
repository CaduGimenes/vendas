<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Fruit extends Model{

    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_fruta ORDER BY cd_fruta");

    }

    public function save(){

        $sql = new Sql();

        $nm_fruta = ucfirst($this->getnm_fruta());

        $result = $sql->select("CALL sp_fruit_save(:cd_fruta, :nm_fruta)", [
            ':cd_fruta'=>$this->getcd_fruta(),
            ':nm_fruta'=>$nm_fruta
        ]);

        $this->setData($result[0]);

    }


    public function get($cd_fruta) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_fruta WHERE cd_fruta = :cd_fruta", [
            ':cd_fruta'=>$cd_fruta
        ]);

        $this->setData($results[0]);

    }

    public function delete() {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_fruta WHERE cd_fruta = :cd_fruta", [
            ':cd_fruta'=>$this->getcd_fruta()
        ]);

    }

}

?>