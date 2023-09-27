<?php
require_once("verificaAutenticacao.php");
//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['salvar'])) {
  //2. Receber os dados para inserir no BD
  $id = $_POST['id'];
  $nome = $_POST['nome'];

  //3. Preparar a SQL
  $sql = "UPDATE tipo
                set nome  = '$nome'
                where id  = $id";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";



}

//Busca usuário selecionado pelo "listarQuarto.php"
$sql = "SELECT * from tipo where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

?>

<?php require_once("cabecalho.php"); ?>



<div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Alterar Categoria</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>


<form method="post">
  <input type="hidden" name="id" value="<?= $linha['id'] ?>">






  <div class="mb-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" name="nome" value="<?= $linha['nome'] ?>">
  </div>
  <button name="salvar" type="submit" style="background-color: #a70162; color: #fff" class="btn"><i class="fa-solid fa-check"></i> Salvar</button>

  <a href="listarTipo.php" type="submit" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i></i>
    Voltar</a>
  </button>

</form>
</div>
</div>
</div>
<script type="text/javascript" src="js/app.js"></script>

</body>

</html>