<?php

namespace Model;

use Model\Sql;
use Model\Model;

class IceCream extends Model{

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_sorvete ORDER BY cd_sorvete");

    }

    public function save(){

        $sql = new Sql();

        $nm_sorvete = ucfirst($this->getnm_sorvete());

        $results = $sql->select("CALL sp_icecream_save(:cd_sorvete, :nm_sorvete)", [
            ':cd_sorvete'=>$this->getcd_sorvete(),
            ':nm_sorvete'=>$nm_sorvete
        ]);

        $this->setData($results[0]);

    }

    public function get($cd_sorvete){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_sorvete WHERE cd_sorvete = :cd_sorvete", [
            ':cd_sorvete'=>$cd_sorvete
        ]);

        $this->setData($results[0]);

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_sorvete WHERE cd_sorvete = :cd_sorvete", [
            ':cd_sorvete'=>$this->getcd_sorvete()
        ]);

    }

}

?>