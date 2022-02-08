<?php
session_start();

include_once "config.php";

// Recebendo os dados do furmulário cadastrar e inserindo no banco

$input = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($input){

    $sql = $pdo->prepare("INSERT INTO estados (uf) VALUES (:uf)");
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

    // Criando mensagem de sucesso: Cadastro

    $_SESSION["cadastro"] = "Usuário cadastrado com sucesso!";

    header('Location: index.php');
    exit; 

}
