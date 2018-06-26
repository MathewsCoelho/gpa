<?php

include_once '../php/TO/BancoTO.php';

class GrupoDAO{
    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarMembro($objTO){        
        $sql = "INSERT INTO grupo(nome_grupo, descricao, id_usuario, data_cadastro, status)"
            . "VALUES('".$objTO->getnomeGrupo()."', '".$objTO->getDescricao()."', '".$objTO->getidUsuario()
            ."', '".$objTO->getdataCadastro() . "', 1)";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    

}

?>
