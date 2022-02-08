<?php
session_start();

include_once "config.php";

// Deletando os dados do banco

$input = filter_input_array(INPUT_GET, FILTER_DEFAULT);

if ($input){
    $sql = $pdo->prepare("DELETE FROM estados WHERE estados.id = :id;");
    $sql->bindValue(':id', $input['id']);
    $sql->execute();

    // Criando mensagem de sucesso: Exclusão

    $_SESSION["exclui"] = "Usuário excluído com sucesso!";

}

header('Location: index.php');
exit;