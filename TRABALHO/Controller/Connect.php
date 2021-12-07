<?php

// REALIZA A CONEXÃO COM O BANCO

    function OpenCon()
    {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "trabalhopota";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
    }
    
    function CloseCon($conn)
    {
    $conn -> close();
    }
?>