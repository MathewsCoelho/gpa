<?php
    session_start();
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];
    $classificacao = $_POST['tipo'];
    $escolaridade = $_POST['escolaridade'];
    $data_cadastro =  date('Y-m-d');
        
    if(empty($nome) || empty($email) || empty($senha) || empty($confSenha)){
        $_SESSION['danger'] = "Por favor preencha todos os campos.";
        echo "<script type='text/javascript'>"
        . " history.go(-1);"
        . "</script>";
    } else{
        if(isMail($email)){
            if($senha == $confSenha) {
              include 'TO/UsuarioTO.php';

                $objTO = new UsuarioTO();
                $objTO->setNome($nome);
                $objTO->setEmail($email);
                $objTO->setSenha(md5($senha));
                $objTO->setClassificacao($classificacao);
                $objTO->setEscolaridade($escolaridade);
                $objTO->setdataCadastro($data_cadastro);

                include 'DAO/UsuarioDAO.php';

                $objDAO = new UsuarioDAO();

                if ($objDAO->salvarUsuario($objTO)) {
                    $_SESSION["success"] = "Usuário cadastrado com sucesso.";
                    echo "<script type='text/javascript'>"
                    . " location.href = '../view/loginUsuario.php'"
                    . "</script>";
                } else {
                    $_SESSION["danger"] = "Usuário já está cadastrado.";
                    echo "<script type='text/javascript'>"
                    . " history.go(-1);"
                    . "</script>";
                }
            } else {
                $_SESSION["danger"] = "As senhas digitadas não são iguais.";
            }
        } else{
            $_SESSION["danger"] = "Digite um email válido.";
            echo "<script type='text/javascript'>"
                    . " history.go(-1);" 
                    . "</script>";
        }
    }
        function isMail($email){
            $er = "/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})$/";
            if (preg_match($er, $email)){
                return true;
            } else {
                return false;
            }
        }

?>

