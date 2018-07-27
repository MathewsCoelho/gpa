<?php
class UsuarioTO{
    private $Nome;
    private $Email;
    private $Senha;
    private $Classificacao;
    private $Escolaridade; 
    private $dataCadastro;
    private $idUsuario;
    private $instituicao;

    public function __construct(){   
        $this->Nome = '';
        $this->Email = '';
        $this->Senha = '';
        $this->Classificacao = '';
        $this->Escolaridade = ''; 
        $this->dataCadastro = '';
        $this->idUsuario = '';
    }
//--------------------------------MÉTODO SET --------------------------//      
    public function setNome($nome){
        $this->Nome = $nome;
    }
    public function setEmail($email){
        $this->Email = $email;
    }
    public function setSenha($senha){
        $this->Senha = $senha;
    }
    public function setClassificacao($classificacao){
        $this->Classificacao = $classificacao;
    }
    public function setEscolaridade($escolaridade){
        $this->Escolaridade = $escolaridade;
    }
    public function setdataCadastro($data_cadastro){
        $this->dataCadastro = $data_cadastro;
    }
    public function setidUsuario($idUsuario){
       $this->idUsuario = $idUsuario;
    }
//--------------------------------MÉTODO GET --------------------------//      
    public function getNome(){
        return $this->Nome;
    }
    public function getEmail(){
        return $this->Email;
    }
    public function getSenha(){
        return $this->Senha;
    }
    public function getClassificacao(){
        return $this->Classificacao;
    }
    public function getEscolaridade(){
        return $this->Escolaridade;
    }
    public function getdataCadastro(){
        return $this->dataCadastro;
    }
    public function getidUsuario(){
        return $this->idUsuario;
    }   
}

?>

