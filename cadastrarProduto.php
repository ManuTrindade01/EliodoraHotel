<?php

require_once("verificaAutenticacao.php");
require_once("conexao.php");

if (isset($_POST['cadastrar'])) {
  //2. Receber os dados para inserir no BD
  $id_marca = $_POST['id_marca'];
  $id_tipo = $_POST['id_tipo'];
  $nome = $_POST['nome'];
  $quantidade = $_POST['quantidade'];
  $valorUnitario = $_POST['valorUnitario'];


  //3. Preparar a SQL
  $sql = "INSERT INTO produto (id_marca, id_tipo, nome, quantidade, valorUnitario) values ('$id_marca', '$id_tipo', '$nome', '$quantidade', '$valorUnitario')";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";



}
?>

<?php require_once("cabecalho.php"); ?>


<title>CadastrarProduto</title>
</head>

<body>

  <div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Produto</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>


        <form method="post">
          <div class="row">
            <div class="mb-3 col">
              <label for="id_marca" class="form-label">Marca</label>
              <select name="id_marca" id="id_marca" class="form-select">
                <option value="">-- Selecione--</option>

                <?php
                $sql = "select * from marca order by nome";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3 col">
              <label for="id_tipo" class="form-label">Categoria</label>
              <select name="id_tipo" id="id_tipo" class="form-select">
                <option value="">-- Selecione--</option>

                <?php
                $sql = "select * from tipo order by nome";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                <?php } ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-7">
              <label for="nome" class="form-label">Nome:</label>
              <input type="text" class="form-control" name="nome">
            </div>
            <div class="mb-3 col">
              <label for="quantidade" class="form-label">Quantidade:</label>
              <input type="text" class="form-control" name="quantidade">
            </div>
            <div class="mb-3 col">
              <label for="valorUnitario" class="form-label">Valor Unitário:</label>
              <input type="text" class="form-control" name="valorUnitario" id="valorUnitario">
            </div>
          </div>
          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;"> Cadastrar
            <i class="fa-solid fa-check"></i>
          </button>

        </form>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#valorUnitario').mask("#.##0,00", { reverse: true });
  </script>
</body>

</html>