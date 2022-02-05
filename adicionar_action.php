<?php
include_once "config.php";

$input = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($input)){

    $sql = $pdo->prepare("INSERT INTO estados (id, uf) VALUES (:id, :uf)");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':uf', $input['uf']);
    $sql->execute();
    $estado_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO enderecos (estado_id, cep, endereco, numero) VALUES (:estado_id, :cep, :endereco, :numero)");
    $sql->bindValue(':estado_id', $estado_id);
    $sql->bindValue(':cep', $input['cep']);
    $sql->bindValue(':endereco', $input['endereco']);
    $sql->bindValue(':numero', $input['numero']);
    $sql->execute();
    $endereco_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO pessoas (endereco_id, nome, cpf, rg, data_nascimento) VALUES (:endereco_id, :nome, :cpf, :rg, :data_nascimento)");
    $sql->bindValue(':endereco_id', $endereco_id);
    $sql->bindValue(':nome', $input['nome']);
    $sql->bindValue(':cpf', $input['cpf']);
    $sql->bindValue(':rg', $input['rg']);
    $sql->bindValue(':data_nascimento', $input['nascimento']);
    $sql->execute();
    $pessoa_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO telefones (pessoa_id, telefone) VALUES (:pessoa_id, :telefone)");
    $sql->bindValue(':pessoa_id', $pessoa_id);
    $sql->bindValue(':telefone', $input['telefone']);
    $sql->execute();    

    header('Location: index.php');
    echo "Dados adicionados com sucesso!";
    exit;


} else {
    header('Location: adicionar.php');
    echo "Dados incompletos!";
    exit;
} 