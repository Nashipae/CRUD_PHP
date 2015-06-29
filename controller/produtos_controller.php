<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// set_include_path('../../classes/Conexao.php' . PATH_SEPARATOR . '../classes/Conexao.php');
include_once("../../classes/Conexao.php");
include_once("../../model/produto.php");

class ProdutosController {

  public function __construct(){
    try {
      $sql = "create table if not exists produtos( ";
      $sql .= "id bigserial not null primary key, ";
      $sql .= "codigo character(4) not null, ";
      $sql .= "descricao character varying(255) not null ";
      $sql .= ");";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->execute();
    } catch (Exception $exc){
      throw $exc;
    }
  }

  public function inserir($produto){
    try {
      $sql = "insert into produtos (codigo, descricao) values (:codigo, :descricao)";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(":codigo", $produto->getCodigo());
      $stmt->bindValue(":descricao", $produto->getDescricao());
      return $stmt->execute();
    } catch (Exception $exc){
      throw $exc;
    }
  }

  public function update($produto){
    try {
      $sql = "update produtos set codigo = :codigo, descricao = :descricao where id = :id";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(":codigo", $produto->getCodigo());
      $stmt->bindValue(":descricao", $produto->getDescricao());
      $stmt->bindValue(":id", $produto->getId());
      return $stmt->execute();
    } catch (Exception $exc){
      throw $exc;
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
      throw $exc;
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

  public function findByCodigo($produto) {
    try {
      if($produto->getId() != null){
        $sql = "select * from produtos where codigo = ? and id <> ? order by id desc limit 1";
      }else{
        $sql = "select * from produtos where codigo = ? order by id desc limit 1";
      }
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(1, $produto->getCodigo());
      if($produto->getId() != null){
        $stmt->bindValue(2, $produto->getId());
      }
      $stmt->execute();
      return $stmt->fetch();
    } catch (Exception $exc){
      throw $exc;
    }
  }

  public function findById($produto) {
    try {
      $sql = "select * from produtos where id = ?";
      $stmt = Conexao::getInstance()->prepare($sql);
      $stmt->bindValue(1, $produto->getId());
      $stmt->execute();
      return $stmt->fetch();
    } catch (Exception $exc){
      throw $exc;
    }
  }

}
