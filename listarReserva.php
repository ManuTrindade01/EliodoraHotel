<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");


//Exclusão //
if (isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "delete from reserva where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);
  $mensagem = "Exclusão realizada com sucesso";
}


$V_WHERE = " ";
//Geração SQL dinãmica para relatório

if (isset($_POST['pesquisar'])) {
  $V_WHERE = " AND hospede.nome like '%" . $_POST['hospede_nome'] . "%' ";
}
//2. Preparar a SQL
$sql = "SELECT * FROM reserva
        WHERE 1 = 1 " . $V_WHERE;


$sql = "select reserva.*, hospede.nome as hospede_nome, quarto.numero as quarto_numero
 from reserva
 left join hospede on hospede.id = reserva.id_hospede
 left join quarto on quarto.id = reserva.id_quarto";


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
<title>Listar Reservas</title>
<div class="card mt-3 mb-3">

  <div class="card-body">
    <h2 class="card-title">Reservas
      <a href="cadastrarReserva.php" class="btn btn-sn" style="background-color: #a70162; color: #fff;"><i class="fa-solid fa-plus"></i>
      </a>
    </h2>
  </div>
</div>

<form method="post">
  <div class="input-group mb-3">
    <input type="text" name="hospede_nome" id="id_hospede" class="form-control" placeholder="Pesquisar por nome do hóspede" aria-label="Recipient's username" aria-describedby="basic-addon2">
    <div class="input-group-append">
      <button name="pesquisar" class="btn" style="background-color: #a70162; color: #fff;" type="submit"><i class="fa-solid fa-magnifying-glass"></i> </button>
</form>
</div>
</div>
<!--
<div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Pesquisar</h2>

    <form method="post">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input name="nome" type="text" class="form-control" id="nome">
      </div>
      <button name="pesquisar" type="submit" class="btn btn-primary">
        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
      </button>
    </form>
  </div>
</div>
-->
<div class="table-responsive">
  <table class="table table-danger table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Hóspede</th>
        <th scope="col">Quarto</th>
        <th scope="col">Data Entrada</th>
        <th scope="col">Data Saída</th>
        <th scope="col">Valor Total</th>
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
            <?= $linha['hospede_nome'] ?>
          </td>
          <td>
            <?= $linha['quarto_numero'] ?>
          </td>
          <td>
            <?= date('d/m/Y', strtotime($linha['dataEntrada'])) ?>
          </td>
          <td>
            <?php
            if (isset($linha['dataSaida'])) {
              echo date('d/m/Y', strtotime($linha['dataSaida']));
            }
            ?>
          </td>
          <td>
            <?= $linha['valorTotalReserva'] ?>
          </td>
          <td>

            <div class="btn-group">
              <a href="alterarReserva.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <!--BOTÃO EXCLUIR-->

              <a href="listarReserva.php?id=<?= $linha['id'] ?>" class="btn btn-danger" onclick="return confirm('Confirma exclusão')">
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