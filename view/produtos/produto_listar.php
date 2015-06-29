<?php
include_once '../../controller/produtos_controller.php';

$controller = new ProdutosController();
$lista = $controller->listar();

?>
<table class="table table-striped table-condensed">
  <thead>
    <tr class="success">
      <th colspan="4" class="text-center">Lista de produtos</th>
    </tr>
  </thead>
  <thead>
    <tr class="success">
      <th>#</th>
      <th>Código</th>
      <th>Descrição</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    <? if(empty($lista)){ ?>
      <tr>
        <td colspan="4">Nenhum registro encontrado.</td>
      </tr>
    <? } else { ?>
      <? foreach ($lista as $key => $value) { ?>
        <tr>
          <td>
            <a href="#" class="edit"><?= $value->getId() ?></a>
          </td>
          <td><?= $value->getCodigo() ?></td>
          <td><?= $value->getDescricao() ?></td>
          <td>
            <a href="#" class="delete">
              <span class="glyphicon glyphicon-remove"></span>
            </a>
          </td>
        </tr>
      <? } ?>
    <? } ?>
  </tbody>
</table>
