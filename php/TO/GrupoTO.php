<?php

class GrupoTO{
    private $idUsuario;
    private $nomeProjeto;
    private $descricao;
    private $email;
    private $dataInicio;
    private $dataFim;
    private $statusProjeto;
    private $idProjeto;
    
    public function __construct() {
        $this->nomeProjeto = '';
        $this->descricao = '';
        $this->email = '';
        $this->dataInicio = '';
        $this->dataFim = '';
        $this->statusProjeto = '';
        $this->idUsuario = '';
        $this->idProjeto = '';
    }
    
    //------ SET ------//
    public function setnomeProjeto($nomeProjeto){
        $this->nomeProjeto = $nomeProjeto;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setdataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
    public function setdataFim($dataFim){
        $this->dataFim = $dataFim;
    }
    public function setstatusProjeto($statusProjeto){
        $this->statusProjeto = $statusProjeto;
    }
    public function setidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setidProjeto($idProjeto){
        $this->idProjeto = $idProjeto;
    }
    
    //----- GET ------//
    
    public function getnomeProjeto(){
        return $this->nomeProjeto;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getdataInicio(){
        return $this->dataInicio;
    }
    public function getdataFim(){
        return $this->dataFim;
    }
    public function getstatusProjeto(){
        return $this->statusProjeto;
    } 
    public function getidUsuario(){
        return $this->idUsuario;
    } 
    public function getidProjeto(){
        return $this->idProjeto;
    } 
    
    
}

?>