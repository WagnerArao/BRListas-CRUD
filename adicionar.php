<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
        <link rel="stylesheet" href="assets/css/style.css">
        <title>BRListas</title>        
    </head>
    <body>
        <header><div class="container"><h1>BRLISTAS DIGITAL</h1></div></header>
        <section class="container">            
            <div class="titulo"><h3>CRIAR NOVO REGISTRO:</h3></div>

            <form method="POST" action="adicionar_action.php">            

                    <input class="input" type="text" name="nome" placeholder="Digite seu nome completo">

                    <input class="input" type="date" name="nascimento" placeholder="Data de Nascimento">

                    <input class="input" type="number" name="telefone" placeholder="Digite seu telefone">

                    <input class="input" type="number" name="cpf" placeholder="Digite seu CPF">

                    <input class="input" type="number" name="rg" placeholder="Digite seu RG">

                    <input class="input" type="text" name="endereco" placeholder="Logradouro">

                    <input class="input" type="text" name="numero" placeholder="Digite o número">

                    <input class="input" type="text" name="cep" placeholder="Digite o CEP">

                    <input class="input" type="text" name="uf" placeholder="UF">

                     <input class="button" type="submit" value="Cadastrar">           
            </form>
        </section>
    </body>
</html>