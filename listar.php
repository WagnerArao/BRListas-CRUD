<?php 

include_once "config.php";

$consulta = $pdo->query("SELECT pessoas.id, pessoas.nome, telefones.telefone, enderecos.endereco, enderecos.numero, enderecos.cep, estados.uf, pessoas.cpf, pessoas.rg, pessoas.data_nascimento
FROM pessoas, enderecos, telefones, estados
WHERE pessoas.id = telefones.pessoa_id AND enderecos.id = pessoas.endereco_id AND estados.id = enderecos.estado_id;");

$dados = "";

while ($lista = $consulta->fetch(PDO::FETCH_ASSOC)){
    extract($lista);
    $nasc = date('d/m/Y', strtotime($data_nascimento));
    $dados = "<tr><td>$nome</td><td>$telefone</td><td>$endereco</td><td>$numero</td><td>$cep</td><td>$uf</td><td>$cpf</td><td>$rg</td><td>$nasc</td><td>Ações</td></tr>";
    echo $dados;

}