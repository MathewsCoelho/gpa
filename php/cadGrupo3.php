<?php

function buscarGrupo($id){       
        include 'DAO/GrupoDAO.php';
        
        $objDAO = new GrupoDAO();
        
        $query = $objDAO->buscarGrupo($id);
        
        return $query;      
}

function buscarGrupoEspecifico($id){     
        include 'DAO/GrupoDAO.php';
        
        $objDAO = new GrupoDAO();
        
        $query = $objDAO->buscarGrupoEspecifico($id);
        
        return $query;       
}

?>

