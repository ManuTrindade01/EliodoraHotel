<?php
require_once("verificaAutenticacao.php");
//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['salvar'])) {
  //2. Receber os dados para inserir no BD
  $id = $_POST['id'];
  $numero = $_POST['numero'];
  $tipo = $_POST['tipo'];
  $capacidade = $_POST['capacidade'];
  $valorDiaria = $_POST['valorDiaria'];


  //3. Preparar a SQL
  $sql = "UPDATE quarto
                set numero  = '$numero',
                    tipo = '$tipo',
                    capacidade = '$capacidade',
                    valorDiaria = '$valorDiaria'
                where id  = $id";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  var_dump($valorDiaria);
  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";



}

//Busca usuário selecionado pelo "listarQuarto.php"
$sql = "SELECT * from quarto where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

?>

<?php require_once("cabecalho.php"); ?>



<div class="container p-4">
  <div class="card">
    <div class="card-header">
      <h2>Alterar Quarto</h2>
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
        <div class="row">
        <div class="mb-3 col-md">
          <label for="numero" class="form-label">Número:</label>
          <input type="text" class="form-control" name="numero" value="<?= $linha['numero'] ?>">
        </div>
        <div class="mb-3 col-md">
          <label for="tipo" class="form-label">Tipo:</label>
          <input type="text" class="form-control" name="tipo" value="<?= $linha['tipo'] ?>">
        </div>
        <div class="mb-3 col-md">
          <label for="capacidade" class="form-label">Capacidade:</label>
          <input type="text" class="form-control" name="capacidade" id="capacidade" value="<?= $linha['capacidade'] ?>">

        </div>
        <div class="mb-3 col-md">
          <label for="valorDiaria" class="form-label">Valor Diária:</label>
          <input name="valorDiaria" type="text" class="form-control" id="valorDiaria"
            value="<?= $linha['valorDiaria'] ?>">
        </div>
        
        </div>
        <button name="salvar" type="submit" style="background-color: #a70162; color: #fff" class="btn"><i
            class="fa-solid fa-check"></i> Salvar</button>

        <a href="listarQuarto.php" type="submit" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i></i>
          Voltar</a>


      </form>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
  integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
  integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
        // Função para exibir a mensagem de confirmação
        window.onbeforeunload = function() {
            return "Você tem certeza que deseja sair desta página? Suas informações não serão salvas.";
        };
       
        // Lógica para remover a mensagem de confirmação quando o formulário for enviado
        document.querySelector('form').addEventListener('submit', function() {
            window.onbeforeunload = null;
        });
    </script>
</body>

</html>