<?php
include_once "config.php";

$input = filter_input_array(INPUT_GET, FILTER_DEFAULT);

if ($input){
    $sql = $pdo->prepare("DELETE FROM estados WHERE estados.id = :id;");
    $sql->bindValue(':id', $input['id']);
    $sql->execute();

}

header('Location: index.php');
    exit;