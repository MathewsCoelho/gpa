<?php
    require_once("cabecalhoInicial.php");
?> 
    <body class="bodyAzul">
        <div class="formularioCad">
            <img src="../imagens/logo.png">
            
            <form name="cadastro" id="Cadastro" action="../php/cadUsuario.php" method="post">
                <p>
                    <label for="nome">Nome: </label>
                    <input name="nome" type="text" class="form-control" placeholder="Digite o seu nome" maxlength="30">
                </p>
                
                <p>
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" required="required" class="form-control" placeholder="Digite seu e-mail" maxlength="50">
                </p>
                
                <p>
                    <label for="senha">Senha: </label>
                    <input type="password" name="senha" class="form-control" placeholder="Digite sua senha" maxlength="20">
                </p>
                
                <p>
                    <label for="confSenha">Confirme sua senha: </label>
                    <input type="password" name="confSenha" class="form-control" placeholder="Confirmação da senha" maxlength="20">
                </p>
                                
                <p>
                    <input type="radio" name="tipo" class="form" value="1" checked="checked"> Aluno
                    <input type="radio" name="tipo" class="form" value="2"> Professor
                </p>
                
                <p>
                    <label for="escolaridade">Nível de Escolaridade: </label>
                    <select name="escolaridade" class="selectpicker form-control">
                        <option value="1">Ensino Fundamental</option>
                        <option value="2">Ensino Médio </option>
                        <option value="3"> Técnico </option>
                        <option value="4">Ensino Superior</option>
                        <option value="5">Pós-Graduação (Menstrado) </option>
                        <option value="6">Pós-Graduação (Doutorado) </option>
                        <option value="7">Pós-Graduação (Especialização) </option>
                        <option value="8">Pós-Graduação (PHD) </option>
                    </select>
                </p>
                
                <p class="text-right">
                    <input type="button" name="btnCadastro" value="Cadastrar" class="btn btn-primary btn-padrao btn-block">
                </p>
                
                <a href="loginUsuario.php" class="text-center">
                    Já está cadastrado? clique aqui.
                </a>
            </form>
        </div>
    </body>
</html>
