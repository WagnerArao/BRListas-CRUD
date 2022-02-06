<?php
include_once "config.php";

$id = filter_input(INPUT_GET, 'id');

if(!empty($id)){
    $sql = $pdo->prepare("SELECT pessoas.id, pessoas.nome, telefones.telefone, enderecos.endereco, enderecos.numero, enderecos.cep, estados.uf, pessoas.cpf, pessoas.rg, pessoas.data_nascimento
    FROM pessoas, enderecos, telefones, estados
    WHERE pessoas.id = telefones.pessoa_id AND enderecos.id = pessoas.endereco_id AND estados.id = enderecos.estado_id AND pessoas.id = :id;");
    $sql->bindValue(':id', $id);
    $sql->execute();
        

    if ($sql->rowCount() > 0){
        $info = $sql->fetch(PDO::FETCH_ASSOC);
        

    } else {
        header('Location: index.php');
        exit;
    } 

} else {
    header('Location: index.php');
    exit;
}

?>

<html>
    <head>
        <title>BRListas</title>
        
    </head>
    <body>
        <h1>BRLISTAS DIGITAL</h1>
        Alterar seus dados:
        <form method="POST" action="editar_action.php">            
            <label>
                Nome: <br>
                <input type="text" name="nome" value="<?=$info['nome'];?>">
            </label><br><br>
            <label>
                Data de Nascimento: <br>
                <input type="date" name="nascimento" value="<?=$info['data_nascimento'];?>">
            </label><br><br>
            <label>
                Telefone: <br>
                <input type="number" name="telefone" value="<?=$info['telefone'];?>">
            </label><br><br>
            <label>
                CPF: <br>
                <input type="number" name="cpf" value="<?=$info['cpf'];?>">
            </label><br><br>
            <label>
                RG: <br>
                <input type="number" name="rg" value="<?=$info['rg'];?>">
            </label><br><br>
            <label>
                Endereço: <br>
                <input type="text" name="endereco" value="<?=$info['endereco'];?>">
            </label><br><br>
            <label>
                Nº: <br>
                <input type="text" name="numero" value="<?=$info['numero'];?>">
            </label><br><br>            
            <label>
                CEP: <br>
                <input type="text" name="cep" value="<?=$info['cep'];?>">
            </label><br><br>
            <label>
                UF:<br>
                <input type="text" name="uf" value="<?=$info['uf'];?>">
            </label><br><br>
            <input type="submit" value="Salvar">           
        </form>
    </body>
</html>