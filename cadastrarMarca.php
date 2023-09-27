<?php

require_once("verificaAutenticacao.php");

//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if(isset($_POST['cadastrar'])){
    //2. Receber os dados para inserir no BD
    $nome = $_POST['nome'];


    //3. Preparar a SQL
    $sql = "INSERT INTO marca (nome) values ('$nome')";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
    
    

}
?>

<?php require_once("cabecalho.php");?>


    <title>CadastrarMarca</title>
</head>
<body>

<div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Marca</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>
        
<form method="post">

  <div class="mb-3">
    <label for="nome" class="form-label">Nome:</label>
    <input type="text" class="form-control" name="nome">
  </div>
  
  
          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar 
            <i class="fa-solid fa-check"></i>
          </button>
          

</form>
</div>
</body>
</html>