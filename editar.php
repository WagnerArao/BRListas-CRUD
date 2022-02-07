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
    <?php require "head.php";?>
    <body>
    <header><div class="container"><h1>BRLISTAS DIGITAL</h1></div></header>
    <section class="container">            
            <div class="titulo"><h3>ALTERAR DADOS</h3></div>

            <form method="POST" action="editar_action.php">    
                
                    <input type="hidden" name="id" value="<?=$info['id'];?>">

                    <input class="input" name="nome" value="<?=$info['nome'];?>">

                    <input class="input" type="date" name="nascimento" value="<?=$info['data_nascimento'];?>">

                    <input class="input" maxlength="14" name="telefone" value="<?=$info['telefone'];?>">

                    <input class="input" maxlength="14" name="cpf" value="<?=$info['cpf'];?>" id="CPF">

                    <input class="input" maxlength="12" name="rg" value="<?=$info['rg'];?>" id="RG">

                    <input class="input" name="endereco" value="<?=$info['endereco'];?>">

                    <input class="input" type="text" name="numero" value="<?=$info['numero'];?>">

                    <input class="input"  maxlength="10" name="cep" value="<?=$info['cep'];?>" id="CEP">

                    <input class="input" type="text" name="uf" maxlength="2" value="<?=$info['uf'];?>">

                    <input class="button" type="submit" value="Salvar">
                    <a href="index.php"><input class="button" type="button" value="Cancelar"></a>         
            </form>
        </section>
        <script src="scripts/mascara.js"></script>
    </body>
</html>