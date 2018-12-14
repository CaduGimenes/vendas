<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Size extends Model {

    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_tamanho ORDER BY cd_tamanho");

    }

    public function save(){

        $sql = new Sql();

        $nm_tamanho = ucfirst($this->getnm_tamanho());
        $vl = $this->getvl_tamanho();
        $vl_tamanho = str_replace(',', '.', $vl);

        $results = $sql->select("CALL sp_size_save(:cd_tamanho, :nm_tamanho, :vl_tamanho)", [
            ':cd_tamanho'=>$this->getcd_tamanho(),
            ':nm_tamanho'=>$nm_tamanho,
            ':vl_tamanho'=>(float)$vl_tamanho
        ]);

        $this->setData($results[0]);

    }


    public function get($cd_tamanho) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_tamanho WHERE cd_tamanho = :cd_tamanho", [
            ':cd_tamanho'=>$cd_tamanho
        ]);

        $this->setData($results[0]);

    }

    public function delete() {

        $sql = new Sql();

        $sql->query("DELETE FROM tb_tamanho WHERE cd_tamanho = :cd_tamanho", [
            ':cd_tamanho'=>$this->getcd_tamanho()
        ]);

    }

}

?>