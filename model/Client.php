<?php

namespace Model;

use Model\Sql;

class Client{

    public static function listAll(){

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro)");

    }


}