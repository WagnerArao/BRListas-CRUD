<?php 
session_start();

include_once "config.php";

// Recebendo os dados para edição do formulário editar e salvando as edições no banco

$input = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($input){
    $sql = $pdo->prepare("UPDATE pessoas, telefones, enderecos, estados 
    SET pessoas.nome = :nome, pessoas.cpf = :cpf, pessoas.rg = :rg, pessoas.data_nascimento = :data_nascimento, telefones.telefone = :telefone, enderecos.endereco = :endereco, enderecos.numero = :numero, enderecos.cep = :cep, estados.uf = :uf 
    WHERE pessoas.id = :id AND pessoas.id = telefones.pessoa_id AND enderecos.id = pessoas.endereco_id AND estados.id = enderecos.estado_id;");

    $sql->bindValue(':id', $input['id']);
    $sql->bindValue(':nome', $input['nome']);
    $sql->bindValue(':cpf', $input['cpf']);
    $sql->bindValue(':rg', $input['rg']);
    $sql->bindValue(':data_nascimento', $input['nascimento']);
    $sql->bindValue(':telefone', $input['telefone']);
    $sql->bindValue(':endereco', $input['endereco']);
    $sql->bindValue(':numero', $input['numero']);
    $sql->bindValue(':cep', $input['cep']);
    $sql->bindValue(':uf', $input['uf']);
    $sql->execute();

    // Criando mensagem de sucesso: Edição

    $_SESSION["altera"] = "Dados alterados com sucesso!";

    header('Location: index.php');
    exit;
    
} 
    