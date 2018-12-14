<?php

namespace Model;

use Model\Page;
use Model\Sql;
use Model\Model;

class Syrup extends Model{

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_calda ORDER BY cd_calda");

    }

    public function save(){

        $sql = new Sql();

        $nm_calda = ucfirst($this->getnm_calda());

        $results = $sql->select("CALL sp_syrup_save(:cd_calda, :nm_calda)",[
            ':cd_calda'=>$this->getcd_calda(),
            ':nm_calda'=>$nm_calda
        ]);

        $this->setData($results[0]);

    }

    public function get($cd_calda){

        $sql = new Sql();

        $results =  $sql->select("SELECT * FROM tb_calda WHERE cd_calda = :cd_calda", [
            ':cd_calda'=>$cd_calda
        ]);

        $this->setData($results[0]);

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_calda WHERE cd_calda = :cd_calda", [
            ':cd_calda'=>$this->getcd_calda()
        ]);

    }

}

?>