<?php
require_once("verificaAutenticacao.php");

// 1. Conectar no BD (IP, usuário, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');

if (isset($_POST['cadastrar'])) {
  // 2. Receber os dados para inserir no BD
  $numero = $_POST['numero'];
  $tipo = $_POST['tipo'];
  $capacidade = $_POST['capacidade'];
  $valorDiaria = str_replace(',', '.', $_POST['valorDiaria']);

  if ($numero > 0 && $valorDiaria > 0) {
    // Verifica se o número do quarto já existe
    $verificaNumero = mysqli_query($conexao, "SELECT numero FROM quarto WHERE numero = '$numero'");
    if (mysqli_num_rows($verificaNumero) > 0) {
      $mensagemErro = "Este número de quarto já está em uso.";
    } else {
      // 3. Preparar a SQL
      $sql = "INSERT INTO quarto (numero, tipo, capacidade, valorDiaria) VALUES ('$numero', '$tipo', '$capacidade', '$valorDiaria')";

      // 4. Executar a SQL
      if (mysqli_query($conexao, $sql)) {
        // 5. Mostrar uma mensagem ao usuário
        $mensagem = "Registro salvo com sucesso.";
      } else {
        $mensagemErro = "Erro ao inserir no banco de dados: " . mysqli_error($conexao);
      }
    }
  } else {
    $mensagemErro = "Número do quarto e valor da diária devem ser maiores que 0.";
  }
}
?>



<?php require_once("cabecalho.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="barbara.ico" type="image/x-icon">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital@1&family=Sorts+Mill+Goudy&family=Unna:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

<title>CadastrarQuarto</title>
</head>

<body>

  <div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Quarto</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagemErro)) { ?>
          <div class="alert alert-warning" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagemErro ?>
          </div>
        <?php } ?>
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>


        <form method="post" id="form" name="form">
          <div class="row">
            <div class="mb-3 col-md">
              <label for="numero" class="form-label">Número:</label>
              <input type="number" class="form-control" name="numero" required>
            </div>


            <div class="mb-3 col-md">
              <label for="tipo" class="form-label">Tipo:</label>
              <select name="tipo" class="form-select" aria-label="Default select example" required id="tipoSelect" required onchange="updateCapacidade()">
                <option value="" disabled selected>Selecione</option>
                <option value="solteiro">Solteiro</option>
                <option value="casal">Casal</option>
              </select>
            </div>

            <div class="mb-3 col-md">
              <label for="capacidade" class="form-label">Capacidade:</label>
              <select name="capacidade" class="form-select" aria-label="Default select example" id="capacidade" required>
                <option value="" disabled selected>Selecione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>

            <div class="mb-3 col-md">
              <label for="valorDiaria" class="form-label">Valor da Diária:</label>
              <input type="text" class="form-control" name="valorDiaria" id="valorDiaria" required min="1.0">

            </div>
          </div>
          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar
            <i class="fa-solid fa-check"></i>
          </button>



        </form>
      </div>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script>
        function updateCapacidade() {
          var tipoSelect = document.getElementById("tipoSelect");
          var capacidadeSelect = document.getElementById("capacidade");

          if (tipoSelect.value === "casal") {
            capacidadeSelect.querySelector('option[value="1"]').disabled = true;
            if (capacidadeSelect.value === "1") {
              capacidadeSelect.value = ""; // Reset capacidade se estiver selecionado como 1
            }
          } else {
            capacidadeSelect.querySelector('option[value="1"]').disabled = false;
          }
        }
      </script>


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
    </div>
</body>

</html>