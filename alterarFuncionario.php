<?php
require_once("verificaAutenticacao.php");
//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['salvar'])) {
  //2. Receber os dados para inserir no BD
  $id = $_POST['id'];
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
  $senha = $_POST['senha'];
  $dataAdmissao = $_POST['dataAdmissao'];
  $salario = $_POST['salario'];
  $cargo = $_POST['cargo'];
  $horarioEntrada = $_POST['horarioEntrada'];
  $horarioSaida = $_POST['horarioSaida'];
  $status = $_POST['status'];

  //3. Preparar a SQL
  $sql = "UPDATE funcionario
                set nome  = '$nome',
                    cpf = '$cpf',
                    dataNascimento = '$dataNascimento',
                    genero = '$genero',
                    estado = '$estado',
                    cidade = '$cidade',
                    endereco = '$endereco',
                    numeroEndereco = '$numeroEndereco',
                    cep = '$cep',
                    email = '$email',
                    telefone = '$telefone',
                    senha = '$senha',
                    dataAdmissao = '$dataAdmissao',
                    salario = '$salario',
                    cargo = '$cargo',
                    horarioEntrada = '$horarioEntrada',
                    horarioSaida = '$horarioSaida',
                    status = '$status'
                where id  = $id";

  //4. Executar a SQL
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";



}

//Busca usuário selecionado pelo "listarHospedes.php"
$sql = "SELECT * from funcionario where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

?>

<?php require_once("cabecalho.php"); ?>




<div class="container p-4">
  <div class="card">
    <div class="card-header">
      <h2>Alterar Funcionário</h2>
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
          <div class="mb-3 col-7">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" value="<?= $linha['nome'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" name="cpf" value="<?= $linha['cpf'] ?>">
          </div>

        </div>
        <div class="row">
          <div class="mb-3 col">
            <label for="dataNascimento" class="form-label">Data de Nascimento:</label>
            <input name="dataNascimento" type="date" class="form-control" value="<?= $linha['dataNascimento'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="genero" class="form-label">Gênero:</label>
            <select name="genero" class="form-select" aria-label="Default select example">
              <option value="F" <?= ($linha['genero'] == "F") ? "selected" : "" ?>>Feminino</option>
              <option value="M" <?= ($linha['genero'] == "M") ? "selected" : "" ?>>Masculino</option>
            </select>
          </div>
          <div class="mb-3 col">
            <label for="estado" class="form-label">UF</label>
            <input name="estado" id="estado" class="form-control" value="<?= $linha['estado'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="cidade" class="form-label">Cidade</label>
            <input name="cidade" id="cidade" value="<?= $linha['cidade'] ?>" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col">
            <label for="bairro" class="form-label">Bairro:</label>
            <input name="bairro" type="text" class="form-control" id="bairro" value="<?= $linha['bairro'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="endereco" class="form-label">Endereço:</label>
            <input name="endereco" type="text" class="form-control" value="<?= $linha['endereco'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="numeroEndereco" class="form-label">Número:</label>
            <input name="numeroEndereco" type="number" class="form-control" value="<?= $linha['numeroEndereco'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="cep" class="form-label">CEP:</label>
            <input name="cep" type="text" class="form-control" value="<?= $linha['cep'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col">
            <label for="email" class="form-label">Email:</label>
            <input name="email" type="email" class="form-control" value="<?= $linha['email'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="telefone" class="form-label">Telefone:</label>
            <input name="telefone" type="text" class="form-control" value="<?= $linha['telefone'] ?>">
          </div>


          <div class="mb-3 col">
            <label for="senha" class="form-label">Senha:</label>
            <input name="senha" type="password" class="form-control" value="<?= $linha['senha'] ?>"
              onchange='confereSenha();'>
          </div>

          <div class="mb-3 col">
            <label for="confirma" class="form-label">Confirmar Senha:</label>
            <input name="confirma" type="password" class="form-control" id="confirma" value="<?= $linha['senha'] ?>"
              onchange='confereSenha();' placeholder="Repita sua senha">
          </div>

          <div class="mb-3 col">
            <label for="dataAdmissao" class="form-label">Data Admissão:</label>
            <input name="dataAdmissao" type="date" class="form-control" value="<?= $linha['dataAdmissao'] ?>">
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col">
            <label for="salario" class="form-label">Salário:</label>
            <input name="salario" type="text" class="form-control" id="salario" value="<?= $linha['salario'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="cargo" class="form-label">Cargo:</label>
            <select name="cargo" class="form-select" aria-label="Default select example" id="cargo"
              value="<?= $linha['cargo'] ?>">
              <option value="" disabled selected>Selecione</option>
              <option value="Administração" <?= ($linha['cargo'] == 'Administração') ? 'selected' : '' ?>>Administração
              </option>
              <option value="Recepção" <?= ($linha['cargo'] == 'Recepção') ? 'selected' : '' ?>>Recepção</option>
            </select>
          </div>
          <div class="mb-3 col">
            <label for="horarioEntrada" class="form-label">Horário de Entrada:</label>
            <input name="horarioEntrada" type="time" class="form-control" value="<?= $linha['horarioEntrada'] ?>">
          </div>
          <div class="mb-3 col">
            <label for="horarioSaida" class="form-label">Horário de Saída:</label>
            <input name="horarioSaida" type="time" class="form-control" value="<?= $linha['horarioSaida'] ?>">
          </div>

          <div class="mb-3 col-3">
            <label for="status" class="form-label">Ativo</label>
            <select name="status" id="status" class="form-select">
              <option value="Sim" <?= ($linha['status'] == 'Sim') ? 'selected' : '' ?>>Sim</option>
              <option value="Não" <?= ($linha['status'] == 'Não') ? 'selected' : '' ?>>Não</option>
            </select>
          </div>
        </div>



        <button name="salvar" type="submit" class="btn" style="background-color: #a70162; color: #fff"><i
            class="fa-solid fa-check"></i> Salvar</button>

        <a href="listarFuncionario.php" type="submit" class="btn btn-warning"><i
            class="fa-solid fa-rotate-left"></i></i> Voltar</a>
        </button>

      </form>
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
      $('#cpf').mask('000.000.000-00', { reverse: true });
      $('#telefone').mask('(00) 00000-0000');
      $('#cep').mask('00000-000');
      $('#salario').mask("#.##0,00", { reverse: true });
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
    </body>

    </html>