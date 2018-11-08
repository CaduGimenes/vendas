<?php

namespace Model;

use Model\Sql;
use Model\Model;

class User extends Model {

    const SESSION = "User";

    public static function verifyLogin(){

        if($_SESSION[User::SESSION] === NULL){

            echo("<script>window.location.href = '/';</script>");

        }

    }

    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_cliente a INNER JOIN tb_endereco b USING(cd_endereco) ORDER BY a.cd_cliente");

    }

    public function login($nr_celular = 0) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_cliente a INNER JOIN tb_endereco b ON a.cd_cliente = b.cd_cliente WHERE a.nr_celular = :nr_celular", [
            ':nr_celular'=>$nr_celular
        ]);

        if(count($results) === 0) {

            $_SESSION[User::SESSION] = ['nr_celular'=>$nr_celular];

            header("Location: /register");

        } else{

                $data = $results[0];

                $user = new User();

                $user->setData($data);

                $_SESSION[User::SESSION] = $user->getValues();

                header("Location: /order");

            }

    }

    public static function logout() {

        $_SESSION[User::SESSION] = null;

    } 

    public function save() {

        $sql = new Sql();

        $results = $sql->select("CALL sp_user_save(:nm_cliente, :nr_celular, :nm_logradouro, :nr_casa, :nm_bairro, :nr_cep, :nm_bloco)",[
            ':nm_cliente'=>$this->getnm_cliente(),
            ':nr_celular'=>$this->getnr_celular(),
            ':nm_logradouro'=>$this->getnm_logradouro(),
            ':nr_casa'=>$this->getnr_casa(),
            ':nm_bairro'=>$this->getnm_bairro(),
            ':nr_cep'=>$this->getnr_cep(),
            ':nm_bloco'=>$this->getnm_bloco()
        ]);

        $this->setData($results[0]);

    }  

}

?>