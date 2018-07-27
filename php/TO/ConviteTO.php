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
    
     public function getidConvite(){
        return $this->idConvite;
    }
    public function getidGrupo(){
        return $this->idGrupo;
    }
    public function getidUsuario(){
        return $this->idUsuario;
    }
    public function gettipo(){
        return $this->tipo;
    }
    public function getstatus(){
        return $this->status;
    }
    public function getdescricao(){
        return $this->descricao;
    }
    public function getidRemetente(){
        return $this->idRemetente;
    }
}

?>