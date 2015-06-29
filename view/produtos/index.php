<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro de produtos</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" media="all">
    <link rel="stylesheet" href="../../assets/css/bootstrap-theme.min.css" media="all">
    <link rel="stylesheet" href="../../assets/css/style.css" media="all">
  </head>
  <body>

    <div class="container">
      <div class="row-fluid">
        <p id="mensagem" class="well-sm"></p>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3>Cadastro de produtos</h3>
          </div>
          <div class="panel-body">
            <form class="form-horizontal" method="post" id="produtos_form">

              <div class="form-group">
                <label for="codigo" class="col-sm-3 control-label">Código</label>
                <div class="col-sm-9">
                  <input type="text" name="codigo" id="codigo"value="" class="form-control" autofocus>
                </div>
              </div>

              <div class="form-group">
                <label for="descricao" class="col-sm-3 control-label">Descrição</label>
                <div class="col-sm-9">
                  <input type="text" name="descricao" id="descricao" value="" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <input type="submit" name="salvar" value="Salvar" class="btn btn-primary">
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
      <div class="row-fluid" id="lista"></div>
    </div>

    <script src="../../assets/js/jquery-1.11.3.min.js" charset="utf-8"></script>
    <script src="../../assets/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="../../assets/js/produtos.js" charset="utf-8"></script>
    <script src="../../assets/js/jquery.validate.min.js" charset="utf-8"></script>
  </body>
</html>
