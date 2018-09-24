<?php

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
        }catch (Exception $e) {
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
        return mysqli_query($this->link,"select * from usuario");
    }

    function selectAllPosts(){
        return mysqli_query($this->link,"select * from post");
    }

    function getUser($id){
        $resultado = $this->selectAllUsers();
        while($result = mysqli_fetch_assoc($resultado)){
            if($result["idusuario"]==$id){
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
        $r = mysqli_query($this->link,"select * from acesso where idAcesso=".$id);
        return mysqli_fetch_assoc($r);
    }

    function execute($query){
        mysqli_begin_transaction($this->link);
        $resultado = mysqli_query($this->link,$query);
        $affRows=mysqli_affected_rows($this->link);
            if($affRows==1)
                mysqli_commit($this->link);
            else
                mysqli_rollback($this->link);

        if($resultado){
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '1;URL=login.php'>
                <script type=\"text/javascript\">
                alert(\"Ação executada com sucesso!\");
            </script>";
        }else{
            echo "
            <META HTTP-EQUIV=REFRESH CONTENT = '1;URL=login.php'>
                <script type=\"text/javascript\">
                alert(\"Erro ao executar essa ação!\");
            </script>";
        }
        return $affRows;
    }

    function insertNivel($nivel){

        $gerPost = 1;
        $gerComent = 1;
        $gerBlog = 1 ; 
        $gerUsuario = 1;

        switch ($nivel) {
            case 1:
                 $q = "insert into acesso values('".$nivel."','".$gerPost."', '".$gerComent."');";
                 return $this->execute($this->link, $q);
                break;
            
            case 2:
                 $q = "insert into acesso values('".$nivel."','".$gerComent."');";
                 return $this->execute($this->link, $q);
                break;
        }
    }

    function prepareInsertUser($nome,$data, $email,$senha, $nivel){
        $q = "insert into usuario values('".$nome."','".$data."','".$email."','".md5($senha)."',".$nivel.");";
        return $this->execute($this->link, $q);
    }

    function deletePost($id){
        $q = "CALL del_post('".$id."')";
        return $this->execute( $this->link, $q);
    }

    function deleteUser($id){
        $q = "CALL del_user('".$id."')";
        return $this->execute( $this->link,$q);
    }

    
}

?>
