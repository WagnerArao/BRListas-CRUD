<?php
session_start();

include_once "config.php";

// Buscando os dados no banco e salvando no array $lista 

$lista = [];
if ($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}

?>

<html>
    <?php require "head.php";?>
    <body>
        <header>
        
            <div class="container"><h1>BRLISTAS DIGITAL</h1></div>
        </header>

        <!-- Exibindo mensagem de sucesso: Cadastro -->

        <?php if(!empty($_SESSION["cadastro"])) : ?>
            <div class="flash"><?php echo($_SESSION["cadastro"]);?></div>
            <?php $_SESSION["cadastro"] = ""; ?>            

        <?php endif; ?>

        <!-- Exibindo mensagem de sucesso: Edição -->

        <?php if(!empty($_SESSION["altera"])) : ?>
            <div class="flash"><?php echo($_SESSION["altera"]);?></div>
            <?php $_SESSION["altera"] = ""; ?>            

        <?php endif; ?>

        <!-- Exibindo mensagem de sucesso: Exclusão -->

        <?php if(!empty($_SESSION["exclui"])) : ?>
            <div class="flash"><?php echo($_SESSION["exclui"]);?></div>
            <?php $_SESSION["exclui"] = ""; ?>            

        <?php endif; ?>

        <!-- Botão de cadastrar -->
    
        <a href="adicionar.php"><button class="cadastro"><h5>CADASTRAR NOVO</h5></button></a>  
        
        <!-- Exibindo mensagem caso não existam usuários cadastrados -->

        <?php if($sql->rowCount() === 0) : ?>

            <?php $_SESSION["vazio"] = "Não há dados a exibir!"; ?> 
            <div class="flash"><?php echo$_SESSION["vazio"];?></div>
                       

        <?php endif; ?>

        <table>
            <tr>
                <td><strong>NOME</strong></td>
                <td><strong>TELEFONE</strong></td>
                <td><strong>ENDEREÇO</strong></td>
                <td><strong>NÚMERO</strong></td>
                <td><strong>CEP</strong></td>
                <td><strong>UF</strong></td>
                <td><strong>CPF</strong></td>
                <td><strong>RG</strong></td>
                <td><strong>DATA DE NASCIMENTO</strong></td>
                <td><strong>AÇÕES</strong></td>
            </tr>   
            

        <?php foreach ($lista as $pessoa): ?>                

            <!-- Aplicando máscara para exibição do nome,  data de nascimento e UF na listagem -->
            
            <?php $name = ucwords($pessoa['nome']);?>
            <?php $nasc = date('d/m/Y', strtotime($pessoa['data_nascimento']));?>
            <?php $estado = strtoupper($pessoa['uf']);?>

            <!-- Listando cada usuário cadastrado -->
                
                <tr>
                    <td><?=$name;?></td>
                    <td><?=$pessoa['telefone'];?></td>
                    <td><?=$pessoa['endereco'];?></td>
                    <td><?=$pessoa['numero'];?></td>
                    <td><?=$pessoa['cep'];?></td>
                    <td><?=$estado;?></td>
                    <td><?=$pessoa['cpf'];?></td>
                    <td><?=$pessoa['rg'];?></td>
                    <td><?=$nasc;?></td>
                    <td>
                        <a href="editar.php?id=<?=$pessoa['id']?>"><button class='button'>Editar</button></a>
                        <a href="excluir.php?id=<?=$pessoa['id']?>"><button class='button' onclick="return confirm('Tem certeza que deseja excluir <?=$pessoa['nome']?>?')">Excluir</button></a>
                    </td>                        
                </tr>
            <?php endforeach;?>           
        </table>
 </body>
</html>



                    