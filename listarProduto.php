<?php
require_once("verificaAutenticacao.php");

require_once("conexao.php");
    

//Exclusão //
if(isset($_GET['id'])) { //Verifica se foi clicado no botão excluir
  $sql = "DELETE FROM produto where id = " . $_GET['id'];
  mysqli_query($conexao, $sql);

$mensagem = "Exclusão realizada com sucesso";

}
$V_WHERE = "";
//Geração SQL dinãmica para relatório
if(isset($_POST['pesquisar'])) {
  $V_WHERE = " AND nome like '%". $_POST['nome'] . "%' ";
}

//2. Preparar a SQL
$sql = "SELECT * FROM produto
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
    <h2 class="card-title">Produtos cadastrados
    <a href="cadastrarProduto.php"
    class="btn btn-sn" style="background-color: #a70162; color: #fff;"><i class="fa-solid fa-plus"></i>
      </a>
      </h2>
  </div>
</div>

     <br>
<!-- PESQUISA -->
<form method="post">
<div class="input-group mb-3">
  <input type="text" name="nome" id="nome" class="form-control" placeholder="Pesquisar por nome" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button name="pesquisar" class="btn" style="background-color: #a70162; color: #fff;" type="submit" ><i class="fa-solid fa-magnifying-glass"></i> </button>
    </form>
    </div>
    </div>


     <table class="table table-danger table-striped">
  <thead >
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Valor Unitário</th>
      <th scope="col">Marca</th>
      <th scope="col">Categoria</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
        <?php while ($linha = mysqli_fetch_array($resultado)){ ?>
    <tr> 
    <td><?= $linha['id'] ?></th>
      <td><?= $linha['nome'] ?></td>
      <td><?= $linha['quantidade'] ?></td>
      <td><?= $linha['valorUnitario'] ?></td>
      <td><?= $linha['id_marca'] ?></td>
      <td><?= $linha['id_tipo'] ?></td>
      <td>
      
        <a href="alterarProduto.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
        <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <!--BOTÃO EXCLUIR-->

        <a href="listarProduto.php?id=<?= $linha['id'] ?>" class="btn btn-danger"
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