<?php

namespace Model;

use Model\Sql;
use Model\Model;

class District extends Model{

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_frete ORDER BY nm_bairro");

    }

    public function save(){

        $sql = new Sql();

        $district = ucfirst($this->getnm_bairro());
        $vl_frete = str_replace(',', '.', $this->getvl_frete());


        $results = $sql->select("CALL sp_district_save(:cd_bairro, :nm_bairro, :vl_frete)",[
            ':cd_bairro'=>$this->getcd_bairro(),
            ':nm_bairro'=>$this->getnm_bairro(),
            ':vl_frete'=>$vl_frete
        ]);

        $this->setData($results[0]);

    }

    public function get($cd_bairro) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_frete WHERE cd_bairro = :cd_bairro", [
            ':cd_bairro'=>$cd_bairro
        ]);

        $this->setData($results[0]);

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_frete WHERE cd_bairro = :cd_bairro",[
            ':cd_bairro'=>$this->getcd_bairro()
        ]);

    }

}