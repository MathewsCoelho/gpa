<?php
include_once '../php/TO/BancoTO.php';

class ConviteDAO{
    public function __construct() {
        $this->BancoTO = new BancoTO();
    }

    public function salvarConvite($objTO){        
        $sql = "INSERT INTO convite(id_grupo, id_usuario, tipo, status, descricao)"
            . "VALUES('".$objTO->getidGrupo()."', '".$objTO->getidUsuario()."', '".$objTO->gettipo()
            ."', '".$objTO->getstatus() . "', '".$objTO->getdescricao()."')";
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    public function buscarConvites($id){      
        $sql = "SELECT * FROM convite JOIN grupo USING(id_grupo) WHERE convite.status = 1 AND convite.id_usuario = " . $id;
        $convites = array();
        $query = mysqli_query($this->BancoTO->conn, $sql);           
        if($query){
            while($convite = mysqli_fetch_assoc($query))
                array_push($convites, $convite);
            return $convites;         
        } else{
            return false;
        }
    }
    public function excluirConvite($id_convite){       
        $sql = "DELETE FROM convite WHERE id_convite = " . $id_convite ;
        $query = mysqli_query($this->BancoTO->conn, $sql);
        if($query){
            return $query;
        } else{
            return false;
        }
    }

    public function verificaConvite($id){        
        $sql = "SELECT * FROM convite WHERE status = 1 AND id_usuario = " . $id;
        $query = mysqli_query($this->BancoTO->conn, $sql);           
        if($query && mysqli_num_rows($query) > 0){
            return true;         
        } else{
            return false;
        }
    }
}

?>