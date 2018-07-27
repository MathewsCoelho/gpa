<?php
include_once '../php/TO/BancoTO.php';

class GrupoDAO{   
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarGrupo($objTO){        
        $sql = "INSERT INTO grupo(nome_grupo, descricao, id_usuario, data_cadastro, status)"
            . "VALUES('".$objTO->getnomeGrupo()."', '".$objTO->getDescricao()."', '".$objTO->getidUsuario()
            ."', '".$objTO->getdataCadastro() . "', 1)";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        $idGrupo = mysqli_insert_id($this->BancoTO->conn);
        if($query){
            return $idGrupo;
        } else{
            return false;
        }
    }   
    public function buscarGrupo($id){        
        $sql = "SELECT * FROM grupo JOIN membro USING(id_grupo) WHERE membro.id_usuario = " . $id . " AND status = 1"; 
        $grupos = array();   
        $query = mysqli_query($this->BancoTO->conn, $sql);                
        if($query){
            while($grupo = mysqli_fetch_assoc($query))
                array_push($grupos, $grupo);
            return $grupos;  
        } else{
            return false;
        }
    }
    public function buscarGrupoEspecifico($id){
        $sql = "SELECT * FROM grupo WHERE id_grupo = " . $id;
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query && mysqli_num_rows($query) > 0){
            return $query;
        } else{
            return false;
        }
    }
    public function editarGrupo($objTO){
        $sql = "UPDATE grupo SET " 
            . "nome_grupo='". $objTO->getnomeGrupo() ."', " 
            . "descricao='". $objTO->getdescricao() ."' " 
            . "WHERE id_grupo = " . $objTO->getidGrupo() . "";   
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }        
    }
   public function excluirGrupo($id){
        $sql = "UPDATE grupo SET status = 0 WHERE id_grupo = " . $id;
        if(mysqli_query($this->BancoTO->conn, $sql)){
            return true;
        } else{
            return false;
        }
    }
}

?>
