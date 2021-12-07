<?php

include "Connect.php";

// APAGA TODOS OS REGISTROS DO BANCO 
if (isset($_POST['deletarBanco'])){
    $connection = OpenCon();
    $connection->query('TRUNCATE TABLE nomes');
    header("Location:../home.php");
}