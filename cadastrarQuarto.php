<?php

require_once("verificaAutenticacao.php");

//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['cadastrar'])) {
  //2. Receber os dados para inserir no BD
  $numero = $_POST['numero'];
  $tipo = $_POST['tipo'];
  $capacidade = $_POST['capacidade'];
  $valorDiaria = $_POST['valorDiaria'];

  if ($valorDiaria > 0) {
    //3. Preparar a SQL
    $sql = "INSERT INTO quarto (numero, tipo, capacidade, valorDiaria) values ('$numero', '$tipo', '$capacidade', '$valorDiaria')";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
  } else {
    $mensagemErro = "Valor da diária deve ser maior que 0.";
  }


}
?>

<?php require_once("cabecalho.php"); ?>


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
              <select name="tipo" class="form-select" aria-label="Default select example" id="generoSelect" required>
                <option value="" disabled selected>Selecione</option>
                <option value="Solteiro">Solteiro</option>
                <option value="Casal">Casal</option>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
        integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      


      <script>
        // Função para exibir a mensagem de confirmação
        window.onbeforeunload = function () {
          return "Você tem certeza que deseja sair desta página? Suas informações não serão salvas.";
        };

        // Lógica para remover a mensagem de confirmação quando o formulário for enviado
        document.querySelector('form').addEventListener('submit', function () {
          window.onbeforeunload = null;
        });
      </script>
    </div>
</body>

</html>