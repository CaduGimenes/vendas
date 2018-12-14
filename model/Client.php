<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Client extends Model{


    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente)");

    }


}