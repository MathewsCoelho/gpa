<?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];
    $classificacao = $_POST['tipo'];
    $escolaridade = $_POST['escolaridade'];
    $data_cadastro =  date('Y-m-d');
        
    if(empty($nome) || empty($email) || empty($senha) || empty($confSenha)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        if(isMail($email)){
            if($senha == $confSenha) {
                session_start();

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

                    echo "<script type='text/javascript'>"
                    . " location.href = '../view/loginUsuario.php'"
                    . "</script>";
                } else {
                    echo "<script type='text/javascript'>"
                    . "alert('Usuário já está cadastrado.');"
                    . " history.go(-1);"
                    . "</script>";
                }
            } else {
                echo "As senhas não são iguais.";
            }
        } else{
            echo "<script type='text/javascript'>"
                    . "alert('Digite um email válido.');"
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

