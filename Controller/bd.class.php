<?php

class bd{

	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';
	private $bd = 'blogspock';
	private $conn = NULL;


	public function conecta_mysql(){

		$this->conn = mysqli_connect($this->host, $this->usuario, $this->senha, $this->bd);
		mysqli_set_charset($this->conn, 'utf8');

		if(mysqli_connect_errno()){
			echo 'Erro ao tentar se conectar com o BD MySQL: ' .mysqli_connect_error();
		}
		return $this->conn;
	}

	function __construct(){
		$this->conecta_mysql();
	}

	public function exec($query,$type,$param){
		$stmt=$this->conn->prepare($query);
		$stmt->bind_param($type,...$param);
		$stmt->execute();
		return $stmt->get_result();
	}

	public function desconecta_mysql(){
		mysqli_close($this->conn);
	}

	function __destruct(){
		$this->desconecta_mysql();
	}
}
?>
