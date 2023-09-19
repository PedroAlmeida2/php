<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "atividade";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname,$user,$pass);
    echo "";
}

catch (PDOException $err){
    echo "ERRO NESSA MERDA: ".$err->getMessage();
}