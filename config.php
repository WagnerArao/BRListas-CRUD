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

$sql = $pdo->query("SELECT pessoas.id, pessoas.nome, telefones.telefone, enderecos.endereco, enderecos.numero, enderecos.cep, estados.uf, pessoas.cpf, pessoas.rg, pessoas.data_nascimento
FROM pessoas, enderecos, telefones, estados
WHERE pessoas.id = telefones.pessoa_id AND enderecos.id = pessoas.endereco_id AND estados.id = enderecos.estado_id;");