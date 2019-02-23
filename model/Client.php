<?php

namespace Model;

use Model\Sql;

class Client{

    // Método responsável por retornar os dados referentes ao cliente.
    public static function listAll(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Retorna todos os dados do cliente (dados pessoais e endereço).
        return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro)");

    }


}