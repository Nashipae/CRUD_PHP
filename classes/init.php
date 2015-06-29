<?php
include_once 'Conexao.php';

class init {

  public function create_database() {
    try {
      if(!$this->get_database_exists('produtos_database')){
        $sql = "create database produtos_database;";
        $stmt = Conexao::getInstanceNoDatabase()->prepare($sql);
        $stmt->execute();
      }
    }catch (Exception $exc){
      echo $exc->getMessage();
    }
  }

  private function get_database_exists($dbname){
    $sql = "select datname from pg_database WHERE datname= :dbname";
    $stmt = Conexao::getInstanceNoDatabase()->prepare($sql);
    $stmt->bindValue(":dbname", $dbname);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    if(empty($stmt->fetch())){
      return false;
    }
    return true;
  }
}
$obj = new init();
$obj->create_database();
?>
