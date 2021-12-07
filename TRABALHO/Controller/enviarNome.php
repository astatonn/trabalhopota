<?php

include "Connect.php";

$connection = OpenCon();
$nome = isset ($_POST["nome"]) ? trim($_POST["nome"]) : FALSE;
$nomeAleatorio = isset ($_POST["nomeAleatorio"]) ? inserirNomeAleatorio() : FALSE ;


// VERIFICA SE ESTÁ SENDO SOLICITADO UM NOME ALEATÓRIO
if (isset ($_GET["nomealeatorio"])) inserirNomeAleatorio();

// ENVIA O NOME PASSADO POR PARÂMETRO PELO USUÁRIO PARA O BANCO DE DADOS
else {

    $sql = "INSERT INTO `nomes` (`id`, `nome`) VALUES (NULL, '".$nome."')";
    $connection->query($sql);
    $connection->commit();

    header("Location:../home.php");


}


// GERA UM NOME ALEATÓRIO E ENVIA PARA 

function inserirNomeAleatorio (){


        $connection = OpenCon();

        $silabas = ["CA", "LU", "FRAN", "LINE", "OL", "MA","CO","BRU", "HE", "LE", "NA", "LI", "VA", "TE", "VE", "TI", "RA", "MI", "BI", "TA", "RA", "MO", "RI", "A", "ANA", "PA", "LO", "WE", "DA", "WA", "SA", "LE", "TI", "VE","RO", "RU"];
        $nomeAleatorio = array_rand($silabas, 3);

        $sql = "INSERT INTO `nomes` (`id`, `nome`) VALUES (NULL, '".$silabas[$nomeAleatorio[0]].$silabas[$nomeAleatorio[1]].$silabas[$nomeAleatorio[2]]."')";
        $connection->query($sql);
        $connection->commit();
    
        header("Location:../home.php");
    
    }




?>