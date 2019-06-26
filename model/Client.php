<?php
    
    namespace Model;
    
    use Model\Sql;
    use Model\Model;
    
    class Client extends Model {
        
        // Método responsável por retornar os dados referentes ao cliente.
        public static function listAll(){
            
            // Instanciando a classe de banco de dados.
            $sql = new Sql();
            
            // Retorna todos os dados do cliente (dados pessoais e endereço).
            return $sql->select("SELECT * FROM tb_endereco a INNER JOIN tb_cliente b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro)");
            
        }
        
        // Método responsavel por obter os dados a partir do ID do cliente.
        public function get($cd_cliente){
            // Instanciando a classe de banco de dados.
            $sql = new Sql();
            
            // Obtem os dados das tabelas tb_cliente, tb_endereco e tb_frete de acordo com ID informado.
            $results =  $sql->select("SELECT * FROM tb_cliente a INNER JOIN tb_endereco b USING(cd_cliente) INNER JOIN tb_frete USING(cd_bairro) WHERE cd_cliente = :cd_cliente", [
                                     ':cd_cliente'=>$cd_cliente
                                     ]);
            
            // Atribuindo os dados aos getters e setters.
            $this->setData($results[0]);
        }
        
        public function delete(int $cd_cliente){
            
            // Instanciando a classe de banco de dados.
            $sql = new Sql();
            
            // Executa um query para realizar a exclusão de dados a partir do ID,
            $sql->query("DELETE FROM tb_pedido WHERE cd_cliente = :cd_cliente",[
                        ':cd_cliente'=>$cd_cliente
                        ]);
            
            // Executa um query para realizar a exclusão de dados a partir do ID,
            $sql->query("DELETE FROM tb_cliente WHERE cd_cliente = :cd_cliente",[
                        ':cd_cliente'=>$cd_cliente
                        ]);
            
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
        
        public function updateAddress($cd_cliente, $nm_logradouro, $nm_cliente, $nr_casa, $nm_bloco, $cd_bairro){
            
            $sql = new Sql();
            
            //$cd_cliente = $this->getClienteId();
            
            //if(null != $this->getnm_logradouro() || $this->getnm_logradouro() != '') {
            if(null != $nm_logradouro || $nm_logradouro != '') {
                
                $nm_logradouro = ucfirst($nm_logradouro);
                $nm_cliente = ucfirst($nm_cliente);
                
                $results = $sql->select("CALL sp_user_update_address(:cd_cliente, :nm_logradouro, :nr_casa, :nm_bloco, :nm_cliente, :cd_bairro)", [
                                        ':cd_cliente'=>(int)$cd_cliente,
                                        ':nm_logradouro'=>$nm_logradouro,
                                        ':nr_casa'=>$nr_casa,
                                        ':nm_bloco'=>$nm_bloco,
                                        ':nm_cliente'=>$nm_cliente,
                                        ':cd_bairro'=>$cd_bairro
                                        ]);
                
                //$this->setData($results[0]);
                
            }
            
        }
        
    }
