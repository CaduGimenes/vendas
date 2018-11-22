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

    public function get($cd_cliente){

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_cliente WHERE cd_cliente = :cd_cliente", [
            ':cd_cliente'=>$cd_cliente
        ]);

        $this->setData($results[0]);

    }

    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) ORDER BY a.cd_cliente;");

    }

    public function login($nr_celular = 0) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_cliente a INNER JOIN tb_endereco b USING(cd_cliente) WHERE nr_celular = :nr_celular", [
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

            header("Location: /order/information");

            }

    }

    public static function logout() {

        $_SESSION[User::SESSION] = null;

    } 

    public function save() {

        $sql = new Sql();

        if(null != $this->getnm_logradouro() || $this->getnm_logradouro() != '') {

            $results = $sql->select("CALL sp_user_save(:nm_cliente, :nr_celular, :nm_logradouro, :nm_bairro, :nr_casa, :nm_bloco, :nr_cep)",[
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

    public function updateAddress($cd_cliente){

        $sql = new Sql();

        if(null != $this->getnm_logradouro() || $this->getnm_logradouro() != '') {
        
        $results = $sql->select("CALL sp_user_update_address(:cd_cliente, :nm_logradouro, :nm_bairro, :nr_casa, :nm_bloco, :nr_cep)", [
            ':cd_cliente'=>(int)$cd_cliente,
            ':nm_logradouro'=>$this->getnm_logradouro(),
            ':nm_bairro'=>$this->getnm_bairro(),
            ':nr_casa'=>$this->getnr_casa(),
            ':nm_bloco'=>$this->getnm_bloco(),
            ':nr_cep'=>$this->getnr_cep()
        ]);

        $this->setData($results[0]);    
        
        }        
    
    }

}

?>