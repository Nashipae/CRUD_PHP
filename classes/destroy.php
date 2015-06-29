<?php
include_once 'Conexao.php';

class destroy {

  public function drop_database() {
    try {
      if($this->get_database_exists('produtos_database')){
        $sql = "drop database produtos_database;";
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
    $result = $stmt->fetch();
    if(empty($result)){
      return false;
    }
    return true;
  }
}
$obj = new destroy();
$obj->drop_database();
?>
