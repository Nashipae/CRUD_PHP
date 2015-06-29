<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// set_include_path('../../classes/Conexao.php' . PATH_SEPARATOR . '../classes/Conexao.php');
include_once("../../classes/Conexao.php");
include_once("../../model/produto.php");

class ProdutosController {

  public function __construct(){

  }

  public function inserir($produto){
    try {
      $sql = "insert into produtos (codigo, descricao) values (:codigo, :descricao)";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(":codigo", $produto->getCodigo());
      $stmt->bindValue(":descricao", $produto->getDescricao());
      return $stmt->execute();
    } catch (Exception $exc){
      echo $exc->getMessage();
    }
  }

  public function listar(){
    try {
      $sql = "select * from produtos order by id desc";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_CLASS, "produto");
      return $result;
    } catch (Exception $exc){
      echo $exc->getMessage();
    }
  }

  public function excluir($produto){
    try {
      $sql = "delete from produtos where id = :id";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(":id", $produto->getId());
      return $stmt->execute();
    } catch (Exception $exc){
      throw $exc;
    }
  }

}
