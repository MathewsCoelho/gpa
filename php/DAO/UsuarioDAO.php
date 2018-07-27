<?php
include_once '../php/TO/BancoTO.php';

class UsuarioDAO{   
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }
    
    public function salvarUsuario($objTO){        
        $sql = "INSERT INTO usuario(nome, email, senha, classificacao, escolaridade, data_cadastro) "
            . "VALUES('".$objTO->getNome()."', '".$objTO->getEmail()."', '".$objTO->getSenha()."', 
            '".$objTO->getClassificacao()."', '".$objTO->getEscolaridade()."', '" . $objTO->getdataCadastro() . "')";         
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
    }   
    public function logarUsuario($email, $senha){
        $sql = "SELECT * FROM usuario " . "WHERE email = '" . $email . "' AND senha = '" . $senha . "'";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query && mysqli_num_rows($query) > 0){
            return $query; 
        } else{
            return false;
        }
    }
    public function verificarUsuario($email){
        $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            $registro = mysqli_fetch_array($query);
            return $registro['id_usuario'];
        } else{
            return false;
        }
    }
}

?>

