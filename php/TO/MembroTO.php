<?php

class MembroTO{
    private $idMembro;
    private $idGrupo;
    private $idUsuario;
    private $tipo;
    
    public function __construct() {
        $this->idMembro = '';
        $this->idGrupo = '';
        $this->idUsuario = '';
        $this->tipo = '';
    }
    
    //------ SET ------//
    public function setidMembro($idMembro){
        $this->idMembro = $idMembro;
    }
    public function setidGrupo($idGrupo){
        $this->idGrupo = $idGrupo;
    }
    public function setidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function settipo($tipo){
        $this->tipo = $tipo;
    }

    //----- GET ------//
    
     public function getidMembro($idMembro){
        $this->idMembro = $idMembro;
    }
    public function getidGrupo($idGrupo){
        $this->idGrupo = $idGrupo;
    }
    public function getidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function gettipo($tipo){
        $this->tipo = $tipo;
    }
}

?>