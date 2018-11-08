<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Complement extends Model {

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_complemento ORDER BY cd_complemento");

    }

    public function save() {

        $sql = new Sql();

        $nm_complemento = ucfirst($this->getnm_complemento());

        $results = $sql->select("CALL sp_complement_save(:cd_complemento, :nm_complemento)", [
            ':cd_complemento'=>$this->getcd_complemento(),
            ':nm_complemento'=>$nm_complemento
        ]);

        $this->setData($results[0]);

    }

    public function get($cd_complemento) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_complemento WHERE cd_complemento = :cd_complemento", [
            ':cd_complemento'=>$cd_complemento
        ]);

        $this->setData($results[0]);

    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_complemento WHERE cd_complemento = :cd_complemento", [
            ':cd_complemento'=>$this->getcd_complemento()
        ]);

    }

}

?>