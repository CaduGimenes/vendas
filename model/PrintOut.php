<?php

namespace Model;

date_default_timezone_set('America/Sao_Paulo');

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
use Model\Order;
use Model\Sql;
use Model\User;

class PrintOut
{

    // Método para checar o sistema operacional.
    public function checkSys()
    {
        // Verificando qual o sistema operacional do servidor.
        switch (PHP_OS) {
            // Baseados em Windows.
            case 'WINNT':
                return 'WIN';
                break;

            // Baseados em Unix.
            case 'Linux':
            case 'Darwin':
                return 'UNIX';
                break;

            // Caso o sistema seja diferente dos listados acima, devolvemos um erro.
            default:
                throw new Exception("Sistema Operacional incompativel com a impressão!");
                break;
        }

    }

    // Método para imprimir as comandas.
    public function printOrder($paymentMethod)
    {

        // Obtendo o sistema operacional do servidor.
        $sys = $this->checkSys();

        // Definindo o tipo de conexão de acordo com o sistema operacional do servidor.
        if ($sys == "WIN") {
            $connector = new WindowsPrintConnector("COM1"); // Conectando com a porta serial em sistemas WIN.
        } else {
            $connector = new FilePrintConnector("/dev/ttyS0"); // Conectando com a porta serial em sistemas baseado em UNIX.
        }

        try {

            // Obtendo a data e as horas.
            $date = new DateTime();

            // Instanciando a classe de pedidos.
            $order = new Order;

            // Obtendo dados do pedido via sessão.
            $orderSession = $order->getSession();

            // Contando quantos pedidos existem.
            $ordersCount = count($orderSession['pedido']);

            // Obtendo o total
            $total = $order->getTotal();

            // Obtendo o troco
            $change = $_SESSION['change'];

            // Instanciando a classe de banco de dados.
            $sql = new Sql();

            // Retornando os ultimos pedidos inseridos de acordo com o número de pedidos - $ordersCount.
            $results = $sql->select("SELECT cd_pedido FROM tb_pedido ORDER BY cd_pedido DESC LIMIT :countId", [
                ':countId' => $ordersCount,
            ]);

            // Instanciando a classe de usuário.
            $user = new User();

            // Obtendo os dados do usuario via sessão.
            $user->getSession();

            // Conectando a impressora.
            $printer = new Printer($connector);

            // Inicializando impressora.
            $printer->initialize();

            for ($i = 0; $i < $ordersCount; $i++) {

                // Comandas para o preparo.
                $printer->text("Vendas!");
                $printer->text("Data - " . $date->format("d/m/Y H:i:s") . " Pedido Nº " . $results[0][$i] . "
                Cliente: " . $user['nm_cliente'] . " Contato: " . $user['nr_celular'] . "
                Tamanho:
                " . $orderSession['tamanho' . $i] . " Frutas: " . $orderSession['frutas' . $i] . " Complementos: " . $orderSession['complemento' . $i] . "
                Caldas: " . $orderSession['caldas0' . $i] . "\n"." 
                Metódo de pagamento:".$paymentMethod."
                Total: R$".$total. "
                Troco: R$".$change. "");
                $printer->cut(Printer::CUT_PARTIAL);
                $printer->feed();

                // Comandas para entrega.
                $printer->text("Vendas!");
                $printer->text("Data - " . $date->format("d/m/Y H:i:s") . " Pedido Nº " . $results[0][$i] . "
                Cliente: " . $user['nm_cliente'] . " Contato: " . $user['nr_celular'] . "
                Tamanho:
                " . $orderSession['tamanho' . $i] . " Endereço: " . $user['nm_logradouro'] . "," . $user['nr_casa'] . " - " . $user['nm_bairro'] . "
                Bloco: " . $user['nm_bloco']. "\n"." 
                Metódo de pagamento:".$paymentMethod."
                Total: R$".$total. "
                Troco: R$".$change. "");
                $printer->cut(Printer::CUT_PARTIAL);
                $printer->feed();

            }

        } catch (Exception $e) {
            // Retorna uma exception caso a impressão de comandas falhe
            echo $e->getMessage('A conexão falhou, verifique a porta serial, ou contate o administrador.');
        }

    }

}
