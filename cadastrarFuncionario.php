<?php
require_once("verificaAutenticacao.php");

require_once("conexao.php");

function validarData($dataNascimento)
{
  $dataObj = new DateTime($dataNascimento);

  // Obtém o ano da data
  $ano = $dataObj->format('Y');

  if ($ano >= 1900 && $ano <= 2099) {
    // A data é válida
    return true;
  } else {
    // A data é inválida, retorna a mensagem de erro
    return false;
  }
}

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
  require_once("conexao.php");

  if (isset($_POST['cadastrar'])) {


    $cpf = $_POST['cpf'];
    $dataNascimento = $_POST['dataNascimento'];

    if (!validarCPF($cpf)) { //Se o CPF for inválido
      $mensagemErro = "CPF inválido.";
      $nome = $_POST['nome'];
      $cpf = $_POST['cpf'];
      $dataNascimento = $_POST['dataNascimento'];
      $genero = $_POST['genero'];
      $estado = $_POST['estado'];
      $cidade = $_POST['cidade'];
      $bairro = $_POST['bairro'];
      $endereco = $_POST['endereco'];
      $bairro = $_POST['bairro'];
      $numeroEndereco = $_POST['numeroEndereco'];
      $cep = $_POST['cep'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $senha = $_POST['senha'];
      $confirma = $_POST['confirma'];
      $dataAdmissao = $_POST['dataAdmissao'];
      $salario = $_POST['salario'];
      $cargo = $_POST['cargo'];
      $horarioEntrada = $_POST['horarioEntrada'];
      $horarioSaida = $_POST['horarioSaida'];

    } else if (!validarData($dataNascimento)) {
      $mensagemErro = "Data de Nascimento inválida.";
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
      $senha = $_POST['senha'];
      $confirma = $_POST['confirma'];
      $dataAdmissao = $_POST['dataAdmissao'];
      $salario = $_POST['salario'];
      $cargo = $_POST['cargo'];
      $horarioEntrada = $_POST['horarioEntrada'];
      $horarioSaida = $_POST['horarioSaida'];
    } else {
      //prossegue com o cadastro pq o CPF está válido
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
      $senha = $_POST['senha'];
      $confirma = $_POST['confirma'];
      $dataAdmissao = $_POST['dataAdmissao'];
      $salario = $_POST['salario'];
      $cargo = $_POST['cargo'];
      $horarioEntrada = $_POST['horarioEntrada'];
      $horarioSaida = $_POST['horarioSaida'];

      //3. Preparar a SQL
      $sql = "INSERT INTO funcionario (nome, cpf, dataNascimento, genero, estado, cidade, bairro, endereco, numeroEndereco, cep, email, telefone, senha, confirma, dataAdmissao, salario, cargo, horarioEntrada, horarioSaida) values ('$nome', '$cpf', '$dataNascimento', '$genero', '$estado', '$cidade', '$bairro', '$endereco', '$numeroEndereco', '$cep', '$email', '$telefone', '$senha', '$confirma', '$dataAdmissao', '$salario', '$cargo', '$horarioEntrada', '$horarioSaida')";

      //4. Executar a SQL
      mysqli_query($conexao, $sql);

      //5. Mostrar uma mensagem ao usuário
      $mensagem = "Registro salvo com sucesso.";
    }
  }
}


?>

<?php require_once("cabecalho.php"); ?>
<link rel="shortcut icon" href="barbara.ico" type="image/x-icon">
<title>CadastrarFuncionário</title>
</head>

<body>

  <div class="container p-4">
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Funcionário</h2>
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

        <form method="post" id="form" name="form">

          <div class="row">
            <div class="mb-3 col-4">
              <label for="nome" class="form-label">Nome Completo:</label>
              <input type="text" class="form-control" name="nome" id="nome" required minlength="10"
                value="<?php echo isset($nome) ? $nome : ''; ?>">
            </div>
            <div class="mb-3 col-3">
              <label for="cpf" class="form-label">CPF:</label>
              <input type="text" class="form-control" name="cpf" id="cpf" required pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"
                value="<?php echo isset($cpf) ? $cpf : ''; ?>">
            </div>
            <div class="mb-3 col">
              <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
              <input name="dataNascimento" type="date" class="form-control" id="dataNascimento" required
                value="<?php echo isset($dataNascimento) ? $dataNascimento : ''; ?>">
            </div>
            <div class="mb-3 col">
              <label for="genero" class="form-label">Gênero:</label>
              <select name="genero" class="form-select" aria-label="Default select example" id="genero" required>
                <option value="" disabled selected>Selecione</option>
                <option value="F">Feminino</option>
                <option value="M">Masculino</option>
              </select>
            </div>
            </div>
            <div class="row">
            <div class="mb-3 col-2">
              <label for="cep" class="form-label">CEP:</label>
              <input name="cep" type="text" class="form-control" id="cep" required pattern="\d{5}-?\d{3}"
                value="<?php echo isset($cep) ? $cep : ''; ?>">
            </div>
            <div class="mb-3 col">
              <label for="estado" class="form-label">UF</label>
              <input name="estado" id="uf" class="form-control" required
                value="<?php echo isset($estado) ? $estado : ''; ?>">
            </div>
            <div class="mb-3 col">
              <label for="cidade" class="form-label">Cidade</label>
              <input name="cidade" id="cidade" class="form-control" required
                value="<?php echo isset($cidade) ? $cidade : ''; ?>">
            </div>
              <div class="mb-3 col">
                <label for="bairro" class="form-label">Bairro:</label>
                <input name="bairro" type="text" class="form-control" id="bairro" required
                  value="<?php echo isset($bairro) ? $bairro : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="endereco" class="form-label">Endereço:</label>
                <input name="endereco" type="text" class="form-control" id="endereco" required
                  value="<?php echo isset($endereco) ? $endereco : ''; ?>">
              </div>
              <div class="mb-3 col-2">
                <label for="numeroEndereco" class="form-label">Número:</label>
                <input name="numeroEndereco" type="number" class="form-control" id="numeroEndereco" required
                  value="<?php echo isset($numeroEndereco) ? $numeroEndereco : ''; ?>">
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col">
                <label for="email" class="form-label">Email:</label>
                <input name="email" type="email" class="form-control" id="email" required
                  value="<?php echo isset($email) ? $email : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="telefone" class="form-label">Telefone:</label>
                <input name="telefone" type="text" class="form-control" id="telefone" required
                  value="<?php echo isset($telefone) ? $telefone : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="senha" class="form-label">Senha:</label>
                <input name="senha" type="password" class="form-control" id="senha" minlength="6" required
                  onchange='confereSenha();'>
              </div>
              <div class="mb-3 col">
                <label for="confirma" class="form-label">Confirmar Senha:</label>
                <input name="confirma" type="password" class="form-control" id="confirma" required
                  onchange='confereSenha();' placeholder="Repita sua senha">
              </div>
            </div>
            <div class="row">
              <div class="mb-3 col">
                <label for="dataAdmissao" class="form-label">Data Admissão:</label>
                <input name="dataAdmissao" type="date" class="form-control" required
                  value="<?php echo isset($dataAdmissao) ? $dataAdmissao : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="salario" class="form-label">Salário:</label>
                <input name="salario" type="text" class="form-control" id="salario" required
                  value="<?php echo isset($salario) ? $salario : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="cargo" class="form-label">Cargo:</label>
                <select name="cargo" class="form-select" aria-label="Default select example" id="cargo" required
                  value="<?php echo isset($cargo) ? $cargo : ''; ?>">
                  <option value="" disabled selected>Selecione</option>
                  <option value="Administração">Administração</option>
                  <option value="Recepção">Recepção</option>
                </select>
              </div>
              <div class="mb-3 col">
                <label for="horarioEntrada" class="form-label">Horário de Entrada:</label>
                <input name="horarioEntrada" type="time" class="form-control" required
                  value="<?php echo isset($horarioEntrada) ? $horarioEntrada : ''; ?>">
              </div>
              <div class="mb-3 col">
                <label for="horarioSaida" class="form-label">Horário de Saída:</label>
                <input name="horarioSaida" type="time" class="form-control" required
                  value="<?php echo isset($horarioSaida) ? $horarioSaida : ''; ?>">
              </div>
            </div>

            <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">
              Cadastrar
              <i class="fa-solid fa-check"></i>
            </button>

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
    $('#cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('#telefone').mask('(00) 00000-0000');
    $('#cep').mask('00000-000');
    $('#salario').mask("#.##0,00", {
      reverse: true
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script>

    $("#cep").blur(function () {
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
      $.getJSON(url, function (dadosRetorno) {
        try {
          // Preenche os campos de acordo com o retorno da pesquisa
          $("#endereco").val(dadosRetorno.logradouro);
          $("#bairro").val(dadosRetorno.bairro);
          $("#cidade").val(dadosRetorno.localidade);
          $("#uf").val(dadosRetorno.uf);
        } catch (ex) { }
      });
    });
  </script>
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


  <script>
    function confereSenha() {
      const senha = document.querySelector('input[name=senha]');
      const confirma = document.querySelector('input[name=confirma]');
      if (confirma.value === senha.value) {
        confirma.setCustomValidity('');
      } else {
        confirma.setCustomValidity('As senhas não conferem');
      }
    }
    function senhaOK() {
      alert("Senhas conferem!")
    }
  </script>


</body>

</html>