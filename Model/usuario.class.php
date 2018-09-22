<?php
require '../Controller/BDClass.class.php';

class usuario{

    private $nome;
    private $data_nasci;
    private $idusuario;
    private $senha;
    private $email;
    private $dataRegistro;
    private $acesso_idAcesso;
    private $permissoes;

    function __construct(){

    }


    /**
     * @return mixed
     */
    public function getNome(){
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome){
        $db = bd::getInstance();
        $q = "UPDATE usuario SET nome='".$nome."' where idusuario=".$this->idusuario.";";
        $db->executeInsert($q);
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDataNasci(){
        return $this->data_nasci;
    }

    /**
     * @param mixed $data_nasci
     */
    public function setDataNasci($data_nasci){
        $db = bd::getInstance();
        $q = "UPDATE usuario SET data_nasci=".$data_nasci." where idusuario=".$this->idusuario.";";
        $db->executeInsert($q);
        $this->data_nasci = $data_nasci;
    }

    /**
     * @return mixed
     */
    public function getIdusuario(){
        return $this->idusuario;
    }

    /**
     * @return mixed
     */
    public function getSenha(){
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha){
        $db = bd::getInstance();
        $q = "UPDATE usuario SET senha='".$senha."' where idusuario=".$this->idusuario.";";
        $db->executeInsert($q);
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email){
        $db = bd::getInstance();
        $q = "UPDATE usuario SET email='".$email."' where idusuario=".$this->idusuario.";";
        $db->executeInsert($q);
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDataRegistro(){
        return $this->dataRegistro;
    }

    /**
     * @return mixed
     */
    public function getAcessoIdAcesso(){
        return $this->acesso_idAcesso;
    }


}

?>