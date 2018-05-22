<?php
    require_once('cabecalhoInicial.php');
?>
    <body class="bodyAzul">
        
        <div class="formularioLogin">
            <img src="../imagens/logo2.png">
            <form name="login" action="../php/loginUsuario.php" method="post">
                <p>
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail">
                </p>
                <p>
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                </p>
                <p class="text-right">
                    <input type="button" name="btnLogin" value="Login" class="btn btn-primary btn-padrao btn-block">
                </p>
                <a href="cadUsuario.php">
                    Não fez seu cadastro? Clique aqui.
                </a>
            </form>
        </div>
    </body>
</html>
