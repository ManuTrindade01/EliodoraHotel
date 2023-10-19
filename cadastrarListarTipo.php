<?php
require_once("verificaAutenticacao.php");

require_once("conexao.php");

if(isset($_POST['cadastrar'])){
    //2. Receber os dados para inserir no BD
    $nome = $_POST['nome'];


    //3. Preparar a SQL
    $sql = "INSERT INTO tipo (nome) values ('$nome')";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}
    

//Exclusão //
if(isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "DELETE FROM tipo where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);

$mensagem = "Exclusão realizada com sucesso";

}
$V_WHERE = "";
//Geração SQL dinãmica para relatório
if(isset($_POST['pesquisar'])) {
  $V_WHERE = " AND nome like '%". $_POST['nome'] . "%' ";
}

//2. Preparar a SQL
$sql = "SELECT * FROM tipo
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

     
<!-- PESQUISA -->
<div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title" >Pesquisar</h2>
    <form method="post">
      <div class="mb-3">
        <label for="nome" class="form-label"></label>
        <input name="nome" type="text" placeholder="Pesquisar Tipo Cadastrado" class="form-control" id="nome">
      </div>
      <button name="pesquisar" type="submit" class="btn btn-primary">
        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
      </button>
    </form>
  </div>
</div>

<!-- NOVO CADASTRO-->
<div class="card mt-3 mb-3">
  <div class="card-body">
    <h2 class="card-title">Cadastrar nova categoria</h2>
<form method="post">
<div class="mb-3">
<label for="nome" class="form-label"></label>
    <input type="text" class="form-control" placeholder="Digite a nova categoria" name="nome">
      </div>
    <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar 
            <i class="fa-solid fa-check"></i>
          </button>
</form>
</div>
</div>
     <table class="table table-danger table-striped">
  <thead >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
        <?php while ($linha = mysqli_fetch_array($resultado)){ ?>
    <tr> 
    <td><?= $linha['id'] ?></th>
      <td><?= $linha['nome'] ?></td>
      <td>
      
        <a href="alterarTipo.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <!--BOTÃO EXCLUIR-->

        <a href="cadastrarListarTipo.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
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