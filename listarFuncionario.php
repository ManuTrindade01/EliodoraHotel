<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

//Exclusão //
if(isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "DELETE FROM funcionario where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);

$mensagem = "Exclusão realizada com sucesso";

}

$V_WHERE = " ";
//Geração SQL dinãmica para relatório
if(isset($_POST['pesquisar'])) {
  $V_WHERE = " AND nome like '%". $_POST['nome'] . "%' ";
}
//2. Preparar a SQL
$sql = "SELECT * FROM funcionario
        WHERE 1 = 1 " . $V_WHERE;

//3. Executar a SQL
$resultado = mysqli_query($conexao, $sql);

?>

<?php require_once("cabecalho.php");?>
         

      <!--Bloco de mensagem-->
      <?php if(isset($mensagem)) { ?>
      <div class="alert alert-success" role="alert">
    <i class="fa-solid fa-square-check"></i>
      <?= $mensagem?>
     </div>
     <?php } ?>



     <div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Listagem de Funcionários
    <a href="cadastrarFuncionario.php"
    class="btn btn-sn" style="background-color: #a70162; color: #fff;"><i class="fa-solid fa-plus"></i>
      </a>
      </h2>
  </div>
</div>



<form method="post">
<div class="input-group mb-3">
  <input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar por nome" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button name="pesquisar" class="btn" style="background-color: #a70162; color: #fff;" type="submit" ><i class="fa-solid fa-magnifying-glass"></i> </button>
    </form>
  </div>
</div>

<br>

     <table class="table table-danger table-striped custom-table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Data Nascimento</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Horário Entrada</th>
      <th scope="col">Horário Saída</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
        <?php while ($linha = mysqli_fetch_array($resultado)){ ?>
    <tr>
    <td><?= $linha['id'] ?></th>
      <td><?= $linha['nome'] ?></td>
      <td><?= $linha['dataNascimento'] ?></td>
      <td><?= $linha['email'] ?></td>
      <td><?= $linha['telefone'] ?></td>
      <td><?= $linha['horarioEntrada'] ?></td>
      <td><?= $linha['horarioSaida'] ?></td>
      <td>
        
        <a href="alterarFuncionario.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <!--BOTÃO EXCLUIR-->

        <a href="listarFuncionario.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
        onclick="return confirm('Confirma exclusão')">
        <i class="fa-solid fa-trash-can"></i>
        </a>
        </td>


    </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>