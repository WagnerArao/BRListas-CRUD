<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "brlistas";


try {
    $pdo = new PDO ("mysql:host=$host;dbname=".$dbname, $user, $pass); 

} catch (PDOException $erro){
    echo "Banco de dados não conectado!".$erro->getMessage();
}

