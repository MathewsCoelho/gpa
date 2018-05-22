<?php
    function salvarProjeto(){
        require_once('DAO/ProjetoDAO.php');
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->salvarProjeto();
        
        return $query;   
    }
    
    function buscaProjeto($id){
          require_once('DAO/ProjetoDAO.php');
        
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->buscarProjeto($id);
        
        return $query;       
    }

    function buscaProjetoStatus($id, $status){
        
        require_once('DAO/ProjetoDAO.php');
        
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->buscarProjetoStatus($id, $status);
        
        return $query;  
    }
    
    function buscaProjetoEspecifico($id){
        require_once('DAO/ProjetoDAO.php');
        
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->buscarProjetoEspecifico($id);
        
        return $query;
    }
        
?>
