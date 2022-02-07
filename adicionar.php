<html>
    <?php require "head.php";?>
    <body>
        <header><div class="container"><h1>BRLISTAS DIGITAL</h1></div></header>
        <section class="container">            
            <div class="titulo"><h3>CRIAR NOVO REGISTRO:</h3></div>

            <form method="POST" action="adicionar_action.php">            

                    <input class="input" name="nome" placeholder="Digite seu nome completo">

                    <input class="input" type="date" name="nascimento" placeholder="Data de Nascimento">

                    <input class="input" maxlength="14" name="telefone" placeholder="Digite seu telefone com DDD">

                    <input class="input" maxlength="14" name="cpf" placeholder="Digite seu CPF" id="CPF">

                    <input class="input" maxlength="12" name="rg" placeholder="Digite seu RG" id="RG">

                    <input class="input" name="endereco" placeholder="Logradouro">

                    <input class="input" type="text" name="numero" placeholder="Digite o número">

                    <input class="input"  maxlength="10" name="cep" placeholder="Digite o CEP" id="CEP">

                    <input class="input" type="text" name="uf" maxlength="2" placeholder="UF">
                    <div>
                        <input class="button" type="submit" value="Cadastrar">
                        <a href="index.php"><input class="button" type="button" value="Cancelar"></a>
                    </div>

            </form>
        </section>
        <script src="scripts/mascara.js"></script>
    </body>
</html>