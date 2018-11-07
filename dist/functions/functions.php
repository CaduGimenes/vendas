<?php

function formatPrice($valor)
{

    if(!$valor > 0) $valor = 0;

    return number_format($valor, 2, ",", ".");

}

?>