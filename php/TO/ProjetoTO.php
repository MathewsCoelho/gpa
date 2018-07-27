<?php

class ProjetoTO{
    private $idProjeto;
    private $nomeProjeto;
    private $descricao;
    private $dataInicio;
    private $dataFim;
    private $dataCadastro;
    private $idUsuario;
    private $statusProjeto;

    public function __construct() {
        $this->nomeProjeto = '';
        $this->descricao = '';
        $this->dataInicio = '';
        $this->dataFim = ''; 
        $this->dataCadastro = '';
        $this->idUsuario = '';
        $this->idProjeto = '';
        $this->statusProjeto = '';
    }
    //--------------------------------MÉTODO SET --------------------------//  
    public function setnomeProjeto($nomeProjeto){
        $this->nomeProjeto = $nomeProjeto;
    }
        public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
        public function setdataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
        public function setTipo($dataFim){
        $this->dataFim = $dataFim;
    }
    public function setdataCadastro($data_cadastro){
        $this->dataCadastro = $data_cadastro;
    }
    public function setidUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    public function setidProjeto($idProjeto){
        $this->idProjeto = $idProjeto;
    }
    public function setstatusProjeto($statusProjeto){
        $this->statusProjeto = $statusProjeto;
    }
    //--------------------------------MÉTODO GET --------------------------//      
    public function getnomeProjeto(){
        return $this->nomeProjeto;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getdataInicio(){
        return $this->dataInicio;
    }
    public function getdataFim(){
        return $this->dataFim;
    }
    public function getdataCadastro(){
        return $this->dataCadastro;
    }
    public function getidUsuario(){
        return $this->idUsuario;
    }   
    public function getidProjeto(){
        return $this->idProjeto;
    }   
    public function getstatusProjeto(){
        return $this->statusProjeto;
    }     
}

?>

