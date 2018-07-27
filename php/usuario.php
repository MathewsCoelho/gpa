<?php
    include 'TO/UsuarioTO.php';
    include 'DAO/UsuarioDAO.php';
    session_start();

    if(isset($_POST['btnCadastro'])){
        echo 'oi';
        $acao = $_POST['btnCadastro'];
    }

    if(isset($_POST['btnLogin'])){
        $acao = $_POST['btnLogin'];
    }

    if($acao == 'Cadastrar'){
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
    }

    if($acao == 'Login'){  
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);
               
        if(empty($email) || empty($senha)){
            $_SESSION["danger"] = "Preencha todos os campos.";
            echo "<script type='text/javascript'>"
            . "alert('Por favor preencha todos os campos.');"
            . " history.go(-1);"
            . "</script>";
        } else{        
            $objDAO = new UsuarioDAO();
            
            $query = $objDAO->logarUsuario($email, $senha);        
            
            if($query) {
                
                $linha = mysqli_fetch_array($query);
                
                $_SESSION['email'] = $linha['email']; 
                $_SESSION['senha'] = $linha['senha']; 
                $_SESSION['nome'] = $linha['nome'];
                $_SESSION['id'] = $linha['id_usuario'];
                
                echo "<script type='text/javascript'>"
                . "location.href = '../view/inicio.php'"
                . "</script>";
            } else{
                unset ($_SESSION['email']);
                unset ($_SESSION['senha']);
                $_SESSION["danger"] = "O usuário não está cadastrado.";   
                echo "<script type='text/javascript'>"
                    . " history.go(-1);"
                    . "</script>";
            }
        }
    }

    

?>

