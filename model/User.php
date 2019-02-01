<?php

namespace Model;

use Model\Sql;
use Model\Model;

class User extends Model {

    const SESSION = "User";

    public static function getSession(){

        return $_SESSION[User::SESSION];

    }

    public function setSession($data = array()){

        $_SESSION[User::SESSION] = $data;

    }

    public function getClienteId(){

        return $_SESSION[User::SESSION]['cd_cliente'];

    }

    public static function verifyLogin(){

        $user = User::getSession();

        if($user === NULL){

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

        return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro) ORDER BY a.cd_cliente;");

    }


    public function login($nr_celular = 0) {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_cliente a INNER JOIN tb_endereco b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro) WHERE nr_celular = :nr_celular", [
            ':nr_celular'=>$nr_celular
        ]);

        if(count($results) === 0) {

            $this->setSession(['nr_celular'=>$nr_celular]);

            header("Location: /register");

        } else{

            $data = $results[0];

            $user = new User();

            $user->setData($data);

            $this->setSession($user->getValues());

            header("Location: /order/information");

            }

    }

    public function logout() {

        $this->setSession(null);

    } 

    public function save() {

        $sql = new Sql();

        if(null != $this->getnm_logradouro() || $this->getnm_logradouro() != '') {

            $nm_cliente = ucfirst($this->getnm_cliente());
            $nm_logradouro = ucfirst($this->getnm_logradouro());

            $results = $sql->select("CALL sp_user_save(:nm_cliente, :nr_celular, :nm_logradouro, :nr_casa, :nm_bloco, :nm_bairro)",[
                ':nm_cliente'=>$nm_cliente,
                ':nr_celular'=>$this->getnr_celular(),
                ':nm_logradouro'=>$nm_logradouro,
                ':nr_casa'=>$this->getnr_casa(),
                ':nm_bloco'=>$this->getnm_bloco(),
                ':nm_bairro'=>(int)$this->getnm_bairro()
            ]);
    
            $this->setData($results[0]);

        }

    }  

    public function updateAddress(){

        $sql = new Sql();

        $cd_cliente = $this->getClienteId();

        if(null != $this->getnm_logradouro() || $this->getnm_logradouro() != '') {
        
        $nm_logradouro = ucfirst($this->getnm_logradouro());
        $nm_cliente = ucfirst($this->getnm_cliente());

        $results = $sql->select("CALL sp_user_update_address(:cd_cliente, :nm_logradouro, :nr_casa, :nm_bloco, :nm_cliente, :cd_bairro)", [
            ':cd_cliente'=>(int)$cd_cliente,
            ':nm_logradouro'=>$nm_logradouro,
            ':nr_casa'=>$this->getnr_casa(),
            ':nm_bloco'=>$this->getnm_bloco(),
            ':nm_cliente'=>$nm_cliente,
            ':cd_bairro'=>$this->getcd_bairro()
        ]);

        $this->setData($results[0]);    
        
        }        
    
    }

}

?>