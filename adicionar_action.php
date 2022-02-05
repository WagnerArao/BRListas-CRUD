<?php
include_once "config.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dados)){

    $sql = $pdo->prepare("INSERT INTO estados (uf) VALUES (:uf)");
    $sql->bindValue(':uf', $dados['uf']);
    $sql->execute();
    $estado_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO enderecos (estado_id, cep, endereco, numero) VALUES (:estado_id, :cep, :endereco, :numero)");
    $sql->bindValue(':estado_id', $estado_id);
    $sql->bindValue(':cep', $dados['cep']);
    $sql->bindValue(':endereco', $dados['endereco']);
    $sql->bindValue(':numero', $dados['numero']);
    $sql->execute();
    $endereco_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO pessoas (endereco_id, nome, cpf, rg, data_nascimento) VALUES (:endereco_id, :nome, :cpf, :rg, :data_nascimento)");
    $sql->bindValue(':endereco_id', $endereco_id);
    $sql->bindValue(':nome', $dados['nome']);
    $sql->bindValue(':cpf', $dados['cpf']);
    $sql->bindValue(':rg', $dados['rg']);
    $sql->bindValue(':data_nascimento', $dados['nascimento']);
    $sql->execute();
    $pessoa_id = $pdo->lastInsertId();

    $sql = $pdo->prepare("INSERT INTO telefones (pessoa_id, telefone) VALUES (:pessoa_id, :telefone)");
    $sql->bindValue(':pessoa_id', $pessoa_id);
    $sql->bindValue(':telefone', $dados['telefone']);
    $sql->execute();    

    header('Location: index.php');
    echo "Dados adicionados com sucesso!";
    exit;


} else {
    header('Location: adicionar.php');
    echo "Dados incompletos!";
    exit;
} 