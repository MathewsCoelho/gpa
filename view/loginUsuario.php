<?php
    require_once('cabecalhoInicial.php');
?>
    <body class="bodyAzul">  
        <div class="formularios formularioLogin">
            <img src="../assets/imagens/logo2.png">
            <form name="login" action="../php/loginUsuario.php" method="post">
                <div class="form-group">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail">
                </div>
                <div class="form-group">
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
                </div>
                <div class="form-group text-right">
                    <input type="button" name="btnLogin" value="Login" class="botao btnBloq btnNovo">
                </div>
            </form>
            <a href="cadUsuario.php">
                Não fez seu cadastro? Clique aqui.
            </a>
        </div>
    </body>
</html>
