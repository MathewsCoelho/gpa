<?php

class TarefaTO{
    
    private $nomeTarefa;
    private $descricao;
    private $dataInicio;
    private $dataFim;
    private $dataCadastro;
    private $idTarefa;
    private $idProjeto;
    private $statusTarefa;
    
    public function __construct() {

        $this->nomeTarefa = '';
        $this->descricao = '';
        $this->dataInicio = '';
        $this->dataFim = ''; 
        $this->dataCadastro = '';
        $this->idTarefa = '';
        $this->idProjeto = '';
        $this->statusTarefa = '';
                
        
    }

    //--------------------------------MÉTODO SET --------------------------//  

    public function setnomeTarefa($nomeTarefa){
        $this->nomeTarefa = $nomeTarefa;
    }
        public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
        public function setdataInicio($dataInicio){
        $this->dataInicio = $dataInicio;
    }
        public function setdataFim($dataFim){
        $this->dataFim = $dataFim;
    }
    public function setdataCadastro($data_cadastro){
        $this->dataCadastro = $data_cadastro;
    }
    public function setidTarefa($idTarefa){
        $this->idTarefa = $idTarefa;
    }
    public function setidProjeto($idProjeto){
        $this->idProjeto = $idProjeto;
    }
    public function setstatusTarefa($statusTarefa){
        $this->statusTarefa = $statusTarefa;
    }

    //--------------------------------MÉTODO GET --------------------------//    
    
    public function getnomeTarefa(){
        return $this->nomeTarefa;
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
    public function getidTarefa(){
        return $this->idTarefa;
    }
    public function getidProjeto(){
        return $this->idProjeto;
    }   
    public function getstatusTarefa(){
        return $this->statusTarefa;
    }   
    
}

?>
