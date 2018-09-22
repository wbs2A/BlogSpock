<?php

/*
class bd{

	private $host = 'localhost';
	private $usuario = 'root';
	private $senha = '';

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
}*/

class bd{
    public static $instance = null;
    private $link;

    private function __construct(){
        $this->host = "127.0.0.1";
        $this->user = "root";
        $this->psswd = "";
        $this->bd = 'blogspock';
    try {
        $this->link = mysqli_connect($this->host, $this->user, $this->psswd, $this->bd);
        $this->link->set_charset('utf8');
    } catch (Exception $e) {
        die("Erro na conexão com MySQL! " . $e->getMessage());
    }
}

    function getInstance(){
        if (self::$instance == NULL)
            self::$instance = new bd();   // Não existe, cria a instância
        return self::$instance;
    }

    private function __clone() {}

    function selectAllUsers(){
        return mysqli_query($this->link,"select * from usuarios");
    }

    function selectAllPosts(){
        return mysqli_query($this->link,"select * from posts.class");
    }

    function selectUser($name,$passw){
        $resultado = $this->selectAllUsers();
        while($result = mysqli_fetch_assoc($resultado)){
            if($result["user"]==$name and ((string) $result["password"])==$passw){
                return $result;
            }
        }
        return null;
    }

    function selectUserByEmail($email){
        $resultado = $this->selectAllUsers();
        while($result = mysqli_fetch_assoc($resultado)){
            if($result["email"]==$email){
                return $result;
            }
        }
        return null;
    }

    function  selectNivel($id){
        $r = mysqli_query($this->link,"select * from acesso where id=".$id);
        return mysqli_fetch_assoc($r);
    }

    function executeInsert($query){
        mysqli_begin_transaction($this->link);
        mysqli_query($this->link,$query);
        $affRows=mysqli_affected_rows($this->link);
        if($affRows==1)
            mysqli_commit($this->link);
        else
            mysqli_rollback($this->link);
        return $affRows;
    }

    function prepareInsertUser($nome,$email,$senha,$v){
        $q = "insert into usuarios values('".$nome."','".$email."','".md5($senha)."',".$v.");";
        return $this->executeInsert($this->link,$q);
    }


}

?>
