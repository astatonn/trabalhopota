<?php

include "Connect.php";

function getData()
{
    $connection = OpenCon();

    // RETORNA TODOS OS NOMES NO BANCO 
    if (OpenCon()) {
        $query = "SELECT `nome` FROM `nomes`";
        return $connection->query($query);
        
    }
}
