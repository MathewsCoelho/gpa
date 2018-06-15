<?php

include_once '../php/TO/BancoTO.php';

class GrupoDAO{
    
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarGrupo($objTO){        
        $sql = "INSERT INTO grupo(nome_projeto, descricao, email, data_inicio, data_fim, status_projeto, id_usuario) "
            . "VALUES('".$objTO->getnomeProjeto()."', '".$objTO->getDescricao()."', '".$objTO->getEmail()
            ."', '".$objTO->getdataInicio()."', '".$objTO->getdataFim() . "', '" 
            . 1 . "', ". $objTO->getidUsuario(). ")";
        echo $sql;
        $query = mysqli_query($this->BancoTO->conn, $sql);
                        
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    
    public function buscarGrupo($id){        
        $sql = "SELECT * FROM grupo WHERE id_usuario = " . $id;              
        $query = mysqli_query($this->BancoTO->conn, $sql);                 
        if($query && mysqli_num_rows($query) > 0){
            return $query;  
        } else{
            return false;
        }
    }
}

?>
