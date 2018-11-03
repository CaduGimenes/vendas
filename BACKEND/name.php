<?php
$conn = new PDO("mysql:host=localhost;dbname=db_name;", "root", "");
$number = count($_POST["pedido"]);
$p = 0;

//echo "<pre>";
//var_dump($_POST);
//echo "</pre>";


for ($i=0; $i < $number ; $i++) { 

    if(empty($_POST['frutas'.$i][$i]) || $_POST['frutas'.$i][$i] === null) $_POST['frutas'.$i][$i] = '';
    if(empty($_POST['caldas'.$i][$i]) || $_POST['caldas'.$i][$i] === null) $_POST['caldas'.$i][$i] = '';

    if(!empty($_POST['pedido']) && $_POST['pedido'] != '') {
        $frutas = implode(',<br>', $_POST['frutas'.$i]);
        $caldas = implode(',', $_POST['caldas'.$i]);
        echo "<br><h3>Pedido ".($i + 1)."</h3>";
        echo "<strong>Frutas</strong> <br>".$frutas."<br>";
        echo "<strong>Caldas</strong>  <br>".$caldas."<br>";
        echo "<hr>";
    }

}
?>