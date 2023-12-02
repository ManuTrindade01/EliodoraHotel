<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

function validarCPF($cpf)
{
  // Remove caracteres não numéricos
  $cpf = preg_replace('/[^0-9]/', '', $cpf);

  // Verifica se o CPF possui 11 dígitos
  if (strlen($cpf) != 11) {
    return false;
  }

  // Verifica se todos os dígitos são iguais
  if (preg_match('/(\d)\1{10}/', $cpf)) {
    return false;
  }

  // Calcula o primeiro dígito verificador
  $soma = 0;
  for ($i = 0; $i < 9; $i++) {
    $soma += $cpf[$i] * (10 - $i);
  }
  $resto = $soma % 11;
  $digito1 = ($resto < 2) ? 0 : 11 - $resto;

  // Calcula o segundo dígito verificador
  $soma = 0;
  for ($i = 0; $i < 10; $i++) {
    $soma += $cpf[$i] * (11 - $i);
  }
  $resto = $soma % 11;
  $digito2 = ($resto < 2) ? 0 : 11 - $resto;

  // Verifica se os dígitos verificadores estão corretos
  if ($cpf[9] == $digito1 && $cpf[10] == $digito2) {
    return true;
  } else {
    return false;
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['cadastrar'])) {
    $cpf = $_POST["cpf"];

    if (!validarCPF($cpf)) { // Se o CPF for inválido
      $mensagemErro = "CPF inválido.";
      $nome = $_POST['nome'];
      $dataNascimento = $_POST['dataNascimento'];
      $genero = $_POST['genero'];
      $estado = $_POST['estado'];
      $cidade = $_POST['cidade'];
      $bairro = $_POST['bairro'];
      $endereco = $_POST['endereco'];
      $numeroEndereco = $_POST['numeroEndereco'];
      $cep = $_POST['cep'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $contatoEmergencia = $_POST['contatoEmergencia'];
    } else {
      //prossegue com o cadastro porque o CPF está válido
      // Receber os dados para inserir no BD
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $dataNascimento = $_POST['dataNascimento'];
      $genero = $_POST['genero'];
      $estado = $_POST['estado'];
      $cidade = $_POST['cidade'];
      $bairro = $_POST['bairro'];
      $endereco = $_POST['endereco'];
      $numeroEndereco = $_POST['numeroEndereco'];
      $cep = $_POST['cep'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $contatoEmergencia = $_POST['contatoEmergencia'];

      if ($numeroEndereco > 0) {
        $verificaCPF = mysqli_query($conexao, "SELECT cpf FROM hospede WHERE cpf = '$cpf'");
        
        if (mysqli_num_rows($verificaCPF) > 0) {
          $mensagemErro = "Este CPF já possui cadastro.";
        } else {
          // Preparar a SQL
          $sql = "INSERT INTO hospede (nome, cpf, dataNascimento, genero, estado, cidade, bairro, endereco, numeroEndereco, cep, email, telefone, contatoEmergencia) values ('$nome', '$cpf', '$dataNascimento', '$genero', '$estado', '$cidade', '$bairro', '$endereco', '$numeroEndereco', '$cep', '$email', '$telefone', '$contatoEmergencia')";

          // Executar a SQL
          mysqli_query($conexao, $sql);

          // Mostrar uma mensagem ao usuário
          $mensagem = "Registro salvo com sucesso.";
        }
      } else {
        $mensagemErro = "O número do endereço não pode ser negativo.";
      }
    }
  }
}
?>


<?php require_once("cabecalho.php"); ?>

<title>Cadastrar Hóspede</title>

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
        <?php if (isset($mensagemErro)) { ?>
          <div class="alert alert-warning" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagemErro ?>
          </div>
        <?php } ?>



        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="form" name="form">
          <div class="form-group row">
            <div class="mb-3 col-md-5">
              <label for="nome" class="form-label">Nome Completo:</label>
              <input type="text" class="form-control" name="nome" id="nome" pattern="[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$" required minlength="10" value="<?php echo isset($nome) ? $nome : ''; ?>">
            </div>
            <div class="mb-3 col-md-3">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" class="form-control" name="cpf" id="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" value="<?php echo isset($cpf) ? $cpf : ''; ?>">

            </div>
            <div class="mb-3 col-md">
              <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
              <input name="dataNascimento" type="date" class="form-control" name="dataNascimento" required value="<?php echo isset($dataNascimento) ? $dataNascimento : ''; ?>" max="<?php echo date('Y-m-d', strtotime('-18 years')); ?>" oninvalid="this.setCustomValidity('O hóspede responsável deve ter pelo menos 18 anos.')" onchange="this.setCustomValidity('')">
            </div>

          </div>
          <div class="row">
            <div class="mb-3 col-md-2">
              <label for="genero" class="form-label">Gênero:</label>
              <select name="genero" class="form-select" aria-label="Default select example" id="generoSelect" required>
                <option value="" disabled selected>Selecione</option>
                <option value="F" <?php echo (isset($genero) && $genero == "F") ? "selected" : ""; ?>>Feminino</option>
                <option value="M" <?php echo (isset($genero) && $genero == "M") ? "selected" : ""; ?>>Masculino</option>
              </select>

            </div>
            <div class="mb-3 col-md-2">
              <label for="cep" class="form-label">CEP:</label>
              <input name="cep" type="text" class="form-control" id="cep" required pattern="\d{5}-?\d{3}" value="<?php echo isset($cep) ? $cep : ''; ?>">
            </div>
            <div class="mb-3 col-md-1">
              <label for="estado" class="form-label">UF</label>
              <input name="estado" type="text" id="uf" class="form-control" required value="<?php echo isset($estado) ? $estado : ''; ?>">

            </div>
            <div class="mb-3 col-md">
              <label for="cidade" class="form-label">Cidade</label>
              <input name="cidade" type="text" id="cidade" class="form-control" required value="<?php echo isset($cidade) ? $cidade : ''; ?>">
            </div>
            <div class="mb-3 col-md">
              <label for="bairro" class="form-label">Bairro:</label>
              <input name="bairro" type="text" class="form-control" id="bairro" required value="<?php echo isset($bairro) ? $bairro : ''; ?>">
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md">
              <label for="endereco" class="form-label">Endereço:</label>
              <input name="endereco" type="text" class="form-control" id="endereco" required value="<?php echo isset($endereco) ? $endereco : ''; ?>">
            </div>
            <div class="mb-3 col-md-2">
              <label for="numeroEndereco" class="form-label">Número:</label>
              <input name="numeroEndereco" type="number" class="form-control" required value="<?php echo isset($numeroEndereco) ? $numeroEndereco : ''; ?>">
            </div>
            <div class="mb-3 col-md">
              <label for="email" class="form-label">Email:</label>
              <input name="email" type="email" class="form-control" id="email" value="<?php echo isset($email) ? $email : ''; ?>">
            </div>
            <div class="mb-3 col-md">
              <label for="telefone" class="form-label">Telefone:</label>
              <input name="telefone" type="text" class="form-control" id="telefone" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" value="<?php echo isset($telefone) ? $telefone : ''; ?>">
            </div>

            <div class="mb-3 col-md">
              <label for="contatoEmergencia" class="form-label">Contato de Emergência:</label>
              <input name="contatoEmergencia" type="text" class="form-control" id="contatoEmergencia" pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})" value="<?php echo isset($contatoEmergencia) ? $contatoEmergencia : ''; ?>">
            </div>
          </div>
          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar
            <i class="fa-solid fa-check"></i>
          </button>
      </div>


      </form>
    </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script>
    $("#cep").blur(function() {
      // Remove tudo o que não é número para fazer a pesquisa
      var cep = this.value.replace(/[^0-9]/, "");

      // Validação do CEP; caso o CEP não possua 8 números, então cancela
      // a consulta
      if (cep.length != 8) {
        return false;
      }

      // A url de pesquisa consiste no endereço do webservice + o cep que
      // o usuário informou + o tipo de retorno desejado (entre "json",
      // "jsonp", "xml", "piped" ou "querty")
      var url = "https://viacep.com.br/ws/" + cep + "/json/";

      // Faz a pesquisa do CEP, tratando o retorno com try/catch para que
      // caso ocorra algum erro (o cep pode não existir, por exemplo) a
      // usabilidade não seja afetada, assim o usuário pode continuar//
      // preenchendo os campos normalmente
      $.getJSON(url, function(dadosRetorno) {
        try {
          // Preenche os campos de acordo com o retorno da pesquisa
          $("#endereco").val(dadosRetorno.logradouro);
          $("#bairro").val(dadosRetorno.bairro);
          $("#cidade").val(dadosRetorno.localidade);
          $("#uf").val(dadosRetorno.uf);
        } catch (ex) {}
      });
    });
  </script>
  <script type="text/javascript" src="js/cep.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('#telefone').mask('(00) 00000-0000');
    $('#contatoEmergencia').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
  </script>
  <script>
    document.getElementById('form').addEventListener('submit', function(event) {
      var telefone = document.getElementById('telefone').value;
      var email = document.getElementById('email').value;

      if (!telefone && !email) {
        event.preventDefault(); // Impede o envio do formulário
        alert('Por favor, preencha pelo menos um entre telefone ou e-mail.');
        return false;
      }
    });
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

</body>

</html>