<?php

class ConviteTO{
    private $idConvite;
    private $idGrupo;
    private $idUsuario;
    private $tipo;
    private $status;
    private $descricao;
    private $idRemetente;

    
    public function __construct() {
        $this->idConvite = '';
        $this->idGrupo = '';
        $this->idUsuario = '';
        $this->tipo = '';
        $this->status = '';
        $this->descricao = '';
        $this->idRemetente = '';
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
    public function setidRemetente($idRemetente){
        $this->idRemetente = $idRemetente;
    }

    //----- GET ------//
    
     public function getidConvite($idConvite){
        return $this->idConvite;
    }
    public function getidGrupo($idGrupo){
        return $this->idGrupo;
    }
    public function getidUsuario($idUsuario){
        return $this->idUsuario;
    }
    public function gettipo($tipo){
        return $this->tipo;
    }
    public function getstatus($status){
        return $this->status;
    }
    public function getdescricao($descricao){
        return $this->descricao;
    }
    public function getidRemetente($idRemetente){
        return $this->idRemetente;
    }
}

?>