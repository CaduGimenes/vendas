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

    public function checkSys()
    {

        switch (PHP_OS) {
            case 'WINNT':
                return 'WIN';
                break;

            case 'Linux':
            case 'Darwin':
                return 'UNIX';
                break;

            default:
                throw new Exception("Sistema Operacional incompativel com a impressão!");
                break;
        }

    }

    public function printOrder($paymentMethod)
    {

        $sys = $this->checkSys();

        if ($sys == "WIN") {
            $connector = new WindowsPrintConnector("COM1"); 
        } else {
            $connector = new FilePrintConnector("/dev/ttyS0"); 
        }

        try {

            $date = new DateTime();

            $order = new Order;

            $orderSession = $order->getSession();

            $ordersCount = count($orderSession['pedido']);

            $total = $order->getTotal();

            $change = $_SESSION['change'];

            $sql = new Sql();

            $results = $sql->select("SELECT cd_pedido FROM tb_pedido ORDER BY cd_pedido DESC LIMIT :countId", [
                ':countId' => $ordersCount,
            ]);

            $user = new User();

            $user->getSession();

            $printer = new Printer($connector);

            $printer->initialize();

            for ($i = 0; $i < $ordersCount; $i++) {

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
            echo $e->getMessage('A conexão falhou, verifique a porta serial, ou contate o administrador.');
        }

    }

}
