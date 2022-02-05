<html>
    <head>
        <title>BRListas</title>
        
    </head>
    <body>
        <h1>BRLISTAS DIGITAL</h1>
        Criar novo registro:
        <form method="POST" action="adicionar_action.php">            
            <label>
                Nome: <br>
                <input type="text" name="nome" placeholder="Digite seu nome completo">
            </label><br><br>
            <label>
                Data de Nascimento: <br>
                <input type="date" name="nascimento" placeholder="Data de Nascimento">
            </label><br><br>
            <label>
                Telefone: <br>
                <input type="number" name="telefone" placeholder="Digite seu telefone">
            </label><br><br>
            <label>
                CPF: <br>
                <input type="number" name="cpf" placeholder="Digite seu CPF">
            </label><br><br>
            <label>
                RG: <br>
                <input type="number" name="rg" placeholder="Digite seu RG">
            </label><br><br>
            <label>
                Endereço: <br>
                <input type="text" name="endereco" placeholder="Logradouro">
            </label><br><br>
            <label>
                Nº: <br>
                <input type="text" name="numero" placeholder="Digite o número">
            </label><br><br>            
            <label>
                CEP: <br>
                <input type="text" name="cep" placeholder="Digite o CEP">
            </label><br><br>
            <label>
                UF:<br>
                <input type="text" name="uf" placeholder="UF">
            </label><br><br>
            <input type="submit" value="Cadastrar">           
        </form>
    </body>
</html>