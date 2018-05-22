<?php 
    session_start();
    
    // as variáveis login e senha recebem os dados digitados na página anterior 
    
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $id = "";
    
    if(empty($email) || empty($senha)){
        echo "<script type='text/javascript'>"
        . "alert('Por favor preencha todos os campos.');"
        . " history.go(-1);"
        . "</script>";
    } else{
        include 'DAO/UsuarioDAO.php';
        
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
            
        }
    }
?>



