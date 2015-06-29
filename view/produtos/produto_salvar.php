<?php

include_once("../../model/produto.php");
include_once("../../controller/produtos_controller.php");

try {
  $produto = new produto();
  $produto->setId($_POST['produto_id']);
  $produto->setCodigo($_POST['codigo']);
  $produto->setDescricao($_POST['descricao']);
  $controller = new ProdutosController();

  if ($controller->findByCodigo($produto)){
    $retorno['error'] = "Já existe um produto com o código {$produto->getCodigo()}";
  } else {
    if ($produto->getId() == null){
      if ($controller->inserir($produto)){
        $retorno['success'] = "Produto adicionado com sucesso";
      }else{
        $retorno['error'] = "Erro ao salvar o produto";
      }
    }else{
      if ($controller->update($produto)){
        $retorno['success'] = "Produto atualizado com sucesso";
      }else{
        $retorno['error'] = "Erro ao atualizar o produto";
      }
    }
  }
  echo json_encode($retorno);
}catch(Exception $exc) {
  echo $exc->getMessage();
}
