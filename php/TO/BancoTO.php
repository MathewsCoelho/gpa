<?php

class BancoTO{
	public $conn = "";
    private $host = "localhost";
    private $user = "root";
    private $db = "gpa";
    private $psw = "senha5";

    public function __construct(){
    	$this->conn = mysqli_connect($this->host, $this->user, $this->psw, $this->db)
    		or die("Erro ao conectar ao servidor");
    }
}
    