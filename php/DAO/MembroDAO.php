<?php

include_once '../php/TO/BancoTO.php';

class MembroDAO{
    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarMembro($objTO){      
        $sql = "INSERT INTO membro(id_usuario, id_grupo)"
            . "VALUES('".$objTO->getidUsuario()."', '".$objTO->getidGrupo()."')";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    

}

?>
