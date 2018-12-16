<?php

require "../../vendor/autoload.php";

session_start();

use Model\Order;

$total = (float) $_SESSION[Order::SESSION_TOTAL];

$removeDot = str_replace(',', '.', (float) $_REQUEST['clientValue']);

$clientValue = $removeDot;

$change = $clientValue - $total;

if (empty($clientValue) || $clientValue === null) {

    $change = 0;

}

echo "R$" . number_format($change, 2, '.', '');
