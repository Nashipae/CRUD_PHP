<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

class produto {

  private $id;
  private $codigo;
  private $descricao;

  // public function __construct($codigo, $descricao){
  //   $this->codigo = $codigo;
  //   $this->descricao = $descricao;
  // }
  public function __construct(){

  }

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getCodigo(){
    return $this->codigo;
  }

  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }
}
