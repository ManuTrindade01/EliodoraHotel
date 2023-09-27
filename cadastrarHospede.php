<?php

require_once("verificaAutenticacao.php");

//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['cadastrar'])) {
  //2. Receber os dados para inserir no BD
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $dataNascimento = $_POST['dataNascimento'];
  $genero = $_POST['genero'];
  $estado = $_POST['estado'];
  $cidade = $_POST['cidade'];
  $endereco = $_POST['endereco'];
  $numeroEndereco = $_POST['numeroEndereco'];
  $cep = $_POST['cep'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $contatoEmergencia = $_POST['contatoEmergencia'];


  //3. Preparar a SQL
  $sql = "INSERT INTO hospede (nome, cpf, dataNascimento, genero, estado, cidade, endereco, numeroEndereco, cep, email, telefone, contatoEmergencia) values ('$nome', '$cpf', '$dataNascimento', '$genero', '$estado', '$cidade', '$endereco', '$numeroEndereco', '$cep', '$email', '$telefone', '$contatoEmergencia')";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";



}
?>

<?php require_once("cabecalho.php"); ?>

<title>CadastrarHospede</title>
<script src="validaCpf.js" defer></script>
</head>

<body>

  <div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Hóspede</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>



        <form method="post" name="formulario">
          <div class="row">
            <div class="mb-3 col-8">
              <label for="nome" class="form-label">Nome Completo:</label>
              <input type="text" class="form-control" name="nome" id="name" placeholder="Insira o nome completo" required minlength="10">
            </div>
            <div class="mb-3 col">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" class="form-control" name="cpf" id="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">
          
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-3">
              <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
              <input name="dataNascimento" type="date" class="form-control">
            </div>
            <div class="mb-3 col-3">
              <label for="genero" class="form-label">Gênero:</label>
              <select name="genero" class="form-select" aria-label="Default select example" id="generoSelect" required>
                <option>Selecione</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
                <option value="X">Prefiro não dizer</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col">
              <label for="estado">UF</label>
              <select name="estado" id="uf" required>
                <option>Selecione Estado</option>
              </select>
            </div>
            <div class="mb-3 col">
              <label for="cidade">Cidade</label>
              <select name="cidade" id="cidade" required>
                <option>Selecione Cidade</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col">
              <label for="endereco" class="form-label">Endereço:</label>
              <input name="endereco" type="text" class="form-control" required>
            </div>
            <div class="mb-3 col-2">
              <label for="numeroEndereco" class="form-label">Número:</label>
              <input name="numeroEndereco" type="number" class="form-control" required>
            </div>
            <div class="mb-3 col-2">
              <label for="cep" class="form-label">CEP:</label>
              <input name="cep" type="text" class="form-control" id="cep" required pattern="\d{5}-?\d{3}">
              <div class="invalid-feedback">Informe o CEP corretamente</div>
              <div class="valid-feedback">CEP informado corretamente</div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col">
              <label for="email" class="form-label">Email:</label>
              <input name="email" type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3 col">
              <label for="telefone" class="form-label">Telefone:</label>
              <input name="telefone" type="text" class="form-control" id="telefone"
                required pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})">
            </div>

            <div class="mb-3 col">
              <label for="contatoEmergencia" class="form-label">Contato de Emergência:</label>
              <input name="contatoEmergencia" type="text" class="form-control" id="contatoEmergencia"
                required pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})">
            </div>
          </div>
          <button name="cadastrar" type="submit" onclick="validaCpf()" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar 
            <i class="fa-solid fa-check"></i>
          </button>
          </div>
          

        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/app.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#telefone').mask('(00) 00000-0000');
    $('#contatoEmergencia').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
  </script>
  



</body>

</html>