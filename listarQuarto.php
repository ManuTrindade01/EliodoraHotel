<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

//Exclusão //
if (isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "DELETE FROM quarto where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);

  $mensagem = "Exclusão realizada com sucesso";

}
$V_WHERE = " ";
//Geração SQL dinãmica para relatório
if (isset($_POST['pesquisar'])) {
  $V_WHERE = " AND numero like '%" . $_POST['numero'] . "%' ";
}

//2. Preparar a SQL
$sql = "SELECT * FROM quarto
        WHERE 1 = 1 " . $V_WHERE;

//3. Executar a SQL
$resultado = mysqli_query($conexao, $sql);

?>

<?php require_once("cabecalho.php"); ?>


<!--Bloco de mensagem-->
<?php if (isset($mensagem)) { ?>
  <div class="alert alert-success" role="alert">
    <i class="fa-solid fa-square-check"></i>
    <?= $mensagem ?>
  </div>
<?php } ?>
<title>Listar Quartos</title>
<div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Quartos cadastrados
      <a href="cadastrarQuarto.php" class="btn btn-sn" style="background-color: #a70162; color: #fff;"><i
          class="fa-solid fa-plus"></i>
      </a>
    </h2>
  </div>
</div>


<form method="post">
  <div class="input-group mb-3">
    <input type="text" name="numero" id="numero" class="form-control" placeholder="Pesquisar por número"
      aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button name="pesquisar" class="btn" style="background-color: #a70162; color: #fff;" type="submit"><i
          class="fa-solid fa-magnifying-glass"></i> </button>
</form>
</div>
</div>


<div class="table-responsive">
<table class="table table-danger table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Número</th>
      <th scope="col">Tipo</th>
      <th scope="col">Capacidade</th>
      <th scope="col">Diária</th>
      <th scope="col">Ativo</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($linha = mysqli_fetch_array($resultado)) { ?>
      <tr>
        <td>
          <?= $linha['id'] ?>
          </th>
        <td>
          <?= $linha['numero'] ?>
        </td>
        <td>
          <?= $linha['tipo'] ?>
        </td>
        <td>
          <?= $linha['capacidade'] ?>
        </td>
        <td>
          <?= $linha['valorDiaria'] ?>
        </td>
        <td>
          <?= $linha['status'] ?>
        </td>
        <td>
      <div class="btn-group">
          <a href="alterarQuarto.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <!--BOTÃO EXCLUIR-->

          <a href="listarQuarto.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
            onclick="return confirm('Confirma exclusão')">
            <i class="fa-solid fa-trash-can"></i>
          </a>
          </div>
        </td>


      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</div>
</body>

</html>