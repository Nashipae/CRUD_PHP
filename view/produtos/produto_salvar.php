<?php

include_once("../../model/produto.php");
include_once("../../controller/produtos_controller.php");

try {
  $produto = new produto();
  $produto->setCodigo($_POST['codigo']);
  $produto->setDescricao($_POST['descricao']);
  $controller = new ProdutosController();

  if ($controller->inserir($produto)){
    $retorno['success'] = "Produto adicionado com sucesso";
  }else{
    $retorno['error'] = "Erro ao salvar o produto";
  }
  echo json_encode($retorno);
}catch(Exception $exc) {
  echo $exc->getMessage();
}
