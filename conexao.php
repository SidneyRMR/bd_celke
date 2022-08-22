<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "db_citrce";
$port = "3306";

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    // echo "Conexão com banco de dados realizada com sucesso!";
} catch(PDOException $err){
    // echo "erro: Conexão com banco de dados não realizada!".
    $erro->getMessage();
}