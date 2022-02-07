<?php
include_once "config.php";

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
                    <a href='editar.php?id=$id'><button>Editar</button><a/>
                    <a href='excluir.php?id=$id'><button>Excluir</button><a/>
                </td>
            </tr>";
    echo $dados;

}