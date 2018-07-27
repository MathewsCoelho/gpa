<?php
include_once '../php/TO/BancoTO.php';

class MembroDAO{
    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarMembro($objTO){      
        $sql = "INSERT INTO membro(id_usuario, id_grupo, tipo)"
            . "VALUES('".$objTO->getidUsuario()."', '".$objTO->getidGrupo()."', '".$objTO->gettipo()."')";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    public function verificarMembro($email){
        $sql = "SELECT id_usuario FROM usuario WHERE email = '$email'";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }
}

?>
