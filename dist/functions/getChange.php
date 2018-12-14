<?php

require("../../vendor/autoload.php");

session_start();

use Model\Order;

$total = $_SESSION[Order::SESSION_TOTAL];

$clientValue = str_replace('.', '', (float)$_REQUEST['clientValue']);


(float)$change = $clientValue - $total;

if(empty($clientValue) || $clientValue === null){

    $change = 0;

}

echo $change;