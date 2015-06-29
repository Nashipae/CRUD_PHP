<?php

include_once("../../model/produto.php");
include_once("../../controller/produtos_controller.php");

try {
  $produto = new produto();
  $produto->setId($_POST['id']);
  $controller = new ProdutosController();
  $produto = $controller->findById($produto);
  echo json_encode($produto);
}catch(Exception $exc) {
  echo $exc->getMessage();
}
