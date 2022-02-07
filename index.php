<?php
include_once "config.php";
?>

<html>
    <?php require "head.php";?>
    <body>
    <header><div class="container"><h1>BRLISTAS DIGITAL</h1></div></header>


    <a href="adicionar.php"><button class="cadastro"><h3>CLIQUE AQUI E FAÇA O SEU CADASTRO!</h3></button></a>
        
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
        <?php 
        
        $dados = "";

            while ($lista = $sql->fetch(PDO::FETCH_ASSOC)){
                extract($lista);
                $nasc = date('d/m/Y', strtotime($data_nascimento));
                $dados = "<tr>
                            <td>$nome</td>
                            <td>$telefone</td>
                            <td>$endereco</td>
                            <td>$numero</td>
                            <td>$cep</td>
                            <td>$uf</td>
                            <td>$cpf</td>
                            <td>$rg</td>
                            <td>$nasc</td>
                            <td>
                                <a href='editar.php?id=$id'><button class='button'>Editar</button></a>
                                <a href='excluir.php?id=$id'><button class='button'>Excluir</button></a>
                            </td>
                        </tr>";
                echo $dados;
        } ?>           
    </table>   
 </body>
</html>