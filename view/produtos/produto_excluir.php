<?php

include_once("../../model/produto.php");
include_once("../../controller/produtos_controller.php");

try {
  $id = $_POST['id'];
  $produto = new produto();
  $produto->setId($id);
  $controller = new ProdutosController();
  if($controller->excluir($produto)){
    $retorno['success'] = "Produto {$id} excluido com sucesso.";
  } else {
    $retorno['error'] = "Erro ao excluir o produto.";
  }

  echo json_encode($retorno);
}catch(Exception $exc) {
  echo $exc->getMessage();
}
