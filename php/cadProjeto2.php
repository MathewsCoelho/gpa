<?php
   
    function buscaProjeto($id){
          require_once('DAO/ProjetoDAO.php');
        
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->buscarProjeto($id);
        
        return $query;       
    }

    function buscaProjetoEspecifico($id){
        require_once('DAO/ProjetoDAO.php');
        
        $objDAO = new ProjetoDAO();
        
        $query = $objDAO->buscarProjetoEspecifico($id);
        
        return $query;
    }
        
?>
