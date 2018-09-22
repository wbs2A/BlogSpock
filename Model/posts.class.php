<?php
/**
 * Created by PhpStorm.
 * User: Betelgeuse
 * Date: 22/09/2018
 * Time: 16:50
 */

class posts{
    private $idpost;
    private $removed;
    private $titulo;
    private $descricao;
    private $textoPost;
    private $ult_Alt;
    private $horaCriacao;
    private $usuario_idusuario;

    /**
     * @return mixed
     */
    public function getIdpost()
    {
        return $this->idpost;
    }

    /**
     * @param mixed $idpost
     */
    public function setIdpost($idpost)
    {
        $this->idpost = $idpost;
    }

    /**
     * @return mixed
     */
    public function getRemoved()
    {
        return $this->removed;
    }

    /**
     * @param mixed $removed
     */
    public function setRemoved($removed)
    {
        $this->removed = $removed;
    }

    /**
     * @return mixed
     */
    public function getTitulo(){
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo){
        $db = bd::getInstance();
        $q = "UPDATE post SET titulo='".$titulo."' where idpost=".$this->idpost.";";
        $db->executeInsert($q);
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getDescricao(){
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao){
        $db = bd::getInstance();
        $q = "UPDATE post SET setDescricao='".$descricao."' where idpost=".$this->idpost.";";
        $db->executeInsert($q);
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getTextoPost(){
        return $this->textoPost;
    }

    /**
     * @param mixed $textoPost
     */
    public function setTextoPost($textoPost){
        $db = bd::getInstance();
        $q = "UPDATE post SET textoPost='".$textoPost."' where idpost=".$this->idpost.";";
        $db->executeInsert($q);
        $this->textoPost = $textoPost;
    }

    /**
     * @return mixed
     */
    public function getUltAlt(){
        return $this->ult_Alt;
    }

    /**
     * @param mixed $ult_Alt
     */
    public function setUltAlt($ult_Alt){
        $db = bd::getInstance();
        $q = "UPDATE post SET ult_Alt=".$ult_Alt." where idpost=".$this->idpost.";";
        $db->executeInsert($q);
        $this->ult_Alt = $ult_Alt;
    }

    public function getHoraCriacao(){
        return $this->horaCriacao;
    }

    /**
     * @return mixed
     */
    public function getUsuarioIdusuario(){
        return $this->usuario_idusuario;
    }


}