<?php

class ConviteTO{
    private $idConvite;
    private $idGrupo;
    private $idUsuario;
    private $tipo;
    private $status;
    private $descricao;

    
    public function __construct() {
        $this->idConvite = '';
        $this->idGrupo = '';
        $this->idUsuario = '';
        $this->tipo = '';
        $this->status = '';
        $this->descricao = '';
    }
    
    //------ SET ------//
    public function setidConvite($idConvite){
        $this->idConvite = $idConvite;
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
    public function setstatus($status){
        $this->status = $status;
    }
    public function setdescricao($descricao){
        $this->descricao = $descricao;
    }

    //----- GET ------//
    
     public function getidConvite($idConvite){
        $this->idConvite = $idConvite;
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
    public function getstatus($status){
        $this->status = $status;
    }
    public function getdescricao($descricao){
        $this->descricao = $descricao;
    }
}

?>