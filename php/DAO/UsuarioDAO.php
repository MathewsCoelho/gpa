<?php

class UsuarioDAO{
    
    public function __construct() {}
    
    public function salvarUsuario($objTO){
        
        require_once('../php/incConecta.php');
        
        $sql = "INSERT INTO usuario(nome, email, senha, classificacao, escolaridade, data_cadastro) "
            . "VALUES('".$objTO->getNome()."', '".$objTO->getEmail()."', '".$objTO->getSenha()."', 
            '".$objTO->getClassificacao()."', '".$objTO->getEscolaridade()."', '" . $objTO->getdataCadastro() . "')";
        echo $sql;                
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
    }
    
    
    
    public function logarUsuario($email, $senha){
        
        require_once('../php/incConecta.php');
        
        $sql = "SELECT * FROM usuario " . "WHERE email = '" . $email . "' AND senha = '" . $senha . "'";

        $query = mysqli_query($conexao, $sql);
                
        if($query && mysqli_num_rows($query) > 0){
            
            return $query; 
            
        } else{
            return false;
        }
        
    
    }
}

?>

