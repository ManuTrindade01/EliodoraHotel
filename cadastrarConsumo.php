<?php

require_once("verificaAutenticacao.php");
require_once("conexao.php");



if (isset($_POST['cadastrar'])) {
  //2. Receber os dados para inserir no BD
  $id_produto = $_POST['id_produto'];
  $quantidadeProduto = $_POST['quantidadeProduto'];
  $data = $_POST['data'];
  $hora = $_POST['hora'];


  //3. Preparar a SQL
  $sql = "insert into consumo (id_produto, quantidadeProduto, data, hora) values ('$id_produto', '$quantidadeProduto', '$data', '$hora')";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuáriobi
  $mensagem = "Registro salvo com sucesso.";



}
?>

<?php require_once("cabecalho.php"); ?>

<title>CadastrarConsumo</title>
</head>

<body>

  <div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Consumo</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>


        <form method="post p-3">
          <div class="row">

            <div class="mb-3 col">
              <label for="id_produto" class="form-label">Produto</label>
              <select name="id_produto" id="id_produto" class="form-select">
                <option value="">-- Selecione--</option>

                <?php
                $sql = "SELECT * from produto order by nome";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>"><?= $linha['nome'] ?></option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3 col">
              <label for="quantidadeProduto" class="form-label">Quantidade do Produto:</label>
              <input type="number" class="form-control" name="quantidadeProduto">
            </div>

            <div class="mb-3 col">
              <label for="data" class="form-label">Data:</label>
              <input type="date" class="form-control" name="data">
            </div>
            <div class="mb-3 col">
              <label for="hora" class="form-label">Hora:</label>
              <input type="time" class="form-control" name="hora">
            </div>
          </div>
          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar
            <i class="fa-solid fa-check"></i>
          </button>
      </div>
    </div>
    </form>
  </div>


</body>

</html>