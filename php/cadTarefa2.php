<?php
    function salvaTarefa(){
        include 'DAO/TarefaDAO.php';
       
        $objDAO = new TarefaDAO();
        
        $query = $objDAO->salvarTarefa();
        
        return $query;     
    } 
    
    function buscarTarefa($id){
        
        include 'DAO/TarefaDAO.php';
        
        $objDAO = new TarefaDAO();
        
        $query = $objDAO->buscarTarefa($id);
        
        return $query;
    }
    
    function buscaTarefaEspecifica($id){
        include 'DAO/TarefaDAO.php';
        
        $objDAO = new TarefaDAO();
        
        $query = $objDAO->buscarTarefaEspecifica($id);
        
        return $query;
    }

?>

