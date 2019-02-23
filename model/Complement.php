<?php

namespace Model;

use Model\Sql;
use Model\Model;

class Complement extends Model {

    // Método para retornar os dados da tabela complemento.
    public static function listAll(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Retorna os dados da tabela.
        return $sql->select("SELECT * FROM tb_complemento ORDER BY cd_complemento");

    }

    // Método para salvar e atualizar os dados referentes aos compelementos.
    public function save() {

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Converte a primeira letra em maiúscula.
        $nm_complemento = ucfirst($this->getnm_complemento());

        // Executa a chamada da procedure sp_complemente_save, passando os parametros @cd_complemento e @nm_complemento que retorna o dado referente, com o mesmo ID.
        $results = $sql->select("CALL sp_complement_save(:cd_complemento, :nm_complemento)", [
            ':cd_complemento'=>$this->getcd_complemento(),
            ':nm_complemento'=>$nm_complemento
        ]);

        // Atribui o resultado aos getters e setters.
        $this->setData($results[0]);

    }

    // Método para recuperar os dados a partir de um ID.
    public function get($cd_complemento) {

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Executa a consulta na tabela tb_complemento, e retorna os dados de acordo com o ID informado ($cd_complemento).
        $results = $sql->select("SELECT * FROM tb_complemento WHERE cd_complemento = :cd_complemento", [
            ':cd_complemento'=>$cd_complemento
        ]);

        // Atribui o resultado ao getter e setter.
        $this->setData($results[0]);

    }

    // Método responsavel por exluir dados da tabela tb_complemento.
    public function delete(){

        // Instanciando a classe de banco de dados.
        $sql = new Sql();

        // Executa uma query e executa a exclusão de acordo com o ID informado.
        $sql->query("DELETE FROM tb_complemento WHERE cd_complemento = :cd_complemento", [
            ':cd_complemento'=>$this->getcd_complemento()
        ]);

    }

}

?>