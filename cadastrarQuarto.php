<?php

require_once("verificaAutenticacao.php");

//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if(isset($_POST['cadastrar'])){
    //2. Receber os dados para inserir no BD
    $numero = $_POST['numero'];
    $tipo = $_POST['tipo'];
    $capacidade = $_POST['capacidade'];
    $valorDiaria = $_POST['valorDiaria'];


    //3. Preparar a SQL
    $sql = "INSERT INTO quarto (numero, tipo, capacidade, valorDiaria) values ('$numero', '$tipo', '$capacidade', '$valorDiaria')";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
    
    

}
?>

<?php require_once("cabecalho.php");?>


    <title>CadastrarQuarto</title>
</head>
<body>

<div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Quarto</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>

    
<form method="post">
<div class="row">
  <div class="mb-3 col-3">
    <label for="numero" class="form-label">Número:</label>
    <input type="number" class="form-control" name="numero">
  </div>
  <div class="mb-3 col-3">
    <label for="tipo" class="form-label">Tipo:</label>
    <input type="text" class="form-control" name="tipo">
  </div>
  <div class="mb-3 col-3">
    <label for="capacidade" class="form-label">Capacidade:</label>
    <input type="number" class="form-control" name="capacidade">
  </div>
  <div class="mb-3 col-3">
    <label for="valorDiaria" class="form-label">Valor da Diária:</label>
    <input type="text" class="form-control" name="valorDiaria" id="valorDiaria">
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
  $('#valorDiaria').mask("#.##0,00", {reverse: true});
</script>
</div>
</body>
</html>