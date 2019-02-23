<?php

namespace Model;

use Model\Sql;
use Model\Model;

class District extends Model{

    // Método responsavel por retornar os dados referentes aos bairros e fretes.
    public static function listAll(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Retorna os dados da tabela tb_frete.
        return $sql->select("SELECT * FROM tb_frete ORDER BY nm_bairro");

    }

    // Método responsavel por salvar e alterar os dados da tabela tb_frete.
    public function save(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Converte a primeira letra em maiúscula.
        $district = ucfirst($this->getnm_bairro());
        // Substitui a vírgula por um ponto
        $vl_frete = str_replace(',', '.', $this->getvl_frete());

        // Realizando a chamada da procedure sp_district_save para salvar ou alterar os dados da tabela tb_frete.
        $results = $sql->select("CALL sp_district_save(:cd_bairro, :nm_bairro, :vl_frete)",[
            ':cd_bairro'=>$this->getcd_bairro(),
            ':nm_bairro'=>$this->getnm_bairro(),
            ':vl_frete'=>$vl_frete
        ]);

        // Atribuindo os dados aos getters e setters.
        $this->setData($results[0]);

    }

    // Método responsavel por obter os dados a partir do ID do frete.
    public function get($cd_bairro) {

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Obtem os dados da tabela tb_frete de acordo com ID informado.
        $results = $sql->select("SELECT * FROM tb_frete WHERE cd_bairro = :cd_bairro", [
            ':cd_bairro'=>$cd_bairro
        ]);

        // Atribuindo os dados aos getters e setters.
        $this->setData($results[0]);

    }

    // Método responsavel por exluir dados da tabela tb_frete
    public function delete(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Executa um query para realizar a exclusão de dados a partir do ID,
        $sql->query("DELETE FROM tb_frete WHERE cd_bairro = :cd_bairro",[
            ':cd_bairro'=>$this->getcd_bairro()
        ]);

    }

}