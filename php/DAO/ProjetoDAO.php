<?php
 
class ProjetoDAO{
    
    public function __construct() {}
    
    public function salvarProjeto($objTO){
        
        include '../php/incConecta.php';
        
        $sql = "INSERT INTO projeto(nome_projeto, descricao, data_inicio, data_fim, data_cadastro, id_usuario, status_projeto) "
            . "VALUES('".$objTO->getnomeProjeto()."', '".$objTO->getDescricao()."', '".$objTO->getdataInicio()."', 
            '".$objTO->getdataFim() . "', '" . $objTO->getdataCadastro() . "', '" . $objTO->getidUsuario(). "', ". $objTO->getstatusProjeto() . ")";
        
        $query = mysqli_query($conexao, $sql);
                        
        if($query){
            return $query;
        } else{
            return false;
        }
    }
    
    public function buscarProjeto($id){
        include '../php/incConecta.php';
        
        $sql = "SELECT * FROM projeto WHERE id_usuario = " . $id;
                
        $query = mysqli_query($conexao, $sql);
                        
        if($query && mysqli_num_rows($query) > 0){
            
            return $query; 
            
        } else{
            return false;
        }
    }

    public function buscarProjetoStatus($id, $status){
        include '../php/incConecta.php';
        
        $sql = "SELECT * FROM projeto WHERE id_usuario = $id AND status_projeto = '$status'" ;
                
        $query = mysqli_query($conexao, $sql);
                        
        if($query && mysqli_num_rows($query) > 0){
            
            return $query; 
            
        } else{
            return false;
        }
    }
    
    public function buscarProjetoEspecifico($id){
        
        include '../php/incConecta.php';
        
        $sql = "SELECT * FROM projeto WHERE id_projeto = " . $id;
        
        $query = mysqli_query($conexao, $sql);
        
        if($query && mysqli_num_rows($query) > 0){
            return $query;
        } else{
            return false;
        }
    }
    
    public function excluirProjeto($id){
        
        include '../php/incConecta.php';
        
        $sql = "DELETE FROM projeto WHERE id_projeto = " . $id;
        
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function editarProjeto($objTO, $id){
        include '../php/incConecta.php';
                
        $sql = "UPDATE projeto SET " 
            . "nome_projeto='". $objTO->getnomeProjeto() ."', " 
            . "descricao='". $objTO->getDescricao() ."', " 
            . "data_inicio='". $objTO->getdataInicio() ."', "  
            . "data_fim='". $objTO->getdataFim() ."', " 
            . "status_projeto='" . $objTO->getstatusProjeto() . "' "
            . "WHERE id_projeto = " . $id;
            
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
        
    }
    
    public function concluirProjeto($id){    
        include '../php/incConecta.php';
        
        $sql = "UPDATE projeto SET " 
        . "status_projeto=" . " 2 "
        . "WHERE id_projeto = " . $id;
                
        if(mysqli_query($conexao, $sql)){
            return true;
        } else{
            return false;
        }
    }
}


?>

