<?php

class GrupoTO{
    private $idGrupo;
    private $nomeGrupo;
    private $descricao;
    private $idUsuario;
    private $dataCadastro;
   
    public function __construct() {
        $this->idGrupo = '';
        $this->descricao = '';
        $this->nomeGrupo = '';
        $this->idUsuario = '';
        $this->dataCadastro = '';
    }    
    //------ SET ------//
    public function setidGrupo($idGrupo){
        $this->idGrupo = $idGrupo;
    }
    public function setdescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setnomeGrupo($nomeGrupo){
        $this->nomeGrupo = $nomeGrupo;
    }
    public function setidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setdataCadastro($dataCadastro){
        $this->dataCadastro = $dataCadastro;
    }
    //----- GET ------//    
    public function getidGrupo(){
        return $this->idGrupo;
    }
    public function getdescricao(){
        return $this->descricao;
    }
    public function getnomeGrupo(){
        return $this->nomeGrupo;
    }
    public function getidUsuario(){
        return $this->idUsuario;
    }
    public function getdataCadastro(){
        return $this->dataCadastro;
    }
}

?>