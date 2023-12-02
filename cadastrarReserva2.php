<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");


//var_dump($_POST);

/*
if (isset($_POST['cadastrar'])) {
  // Receber os dados para inserir no BD
  $id_hospede = $_POST['id_hospede'];
  $dataEntrada = ($_POST['dataEntrada']);
  $dataSaida = ($_POST['dataSaida']);
  $quantHospede = $_POST['quantHospede'];
  $observacao = $_POST['observacao'];

  
    // Preparar a SQL para inserir os dados da reserva
    $sql = "INSERT INTO reserva (id_hospede, dataEntrada, dataSaida, quantHospede, observacao) VALUES ('$id_hospede', '$dataEntrada', '$dataSaida', '$quantHospede', '$observacao')";
    // Executar a SQL para inserção
    mysqli_query($conexao, $sql);
}*/

/*
if (isset($_POST['cadastrar'])) {
    $id_quarto = $_POST['id_quarto'];

    // Calcular a quantidade de dias da reserva
    $diferencaDias = ($dataSaida - $dataEntrada) / (60 * 60 * 24); // 60 segundos * 60 minutos * 24 horas

    // Obter o valor da diária do quarto
    $sqlQuarto = "SELECT valorDiaria FROM quarto WHERE id = '$id_quarto'";
    $resultadoQuarto = mysqli_query($conexao, $sqlQuarto);

    $quarto = mysqli_fetch_assoc($resultadoQuarto);
    $valorDiaria = $quarto['valorDiaria'];

    // Calcular o valor total da reserva
    $valorTotalReserva = $valorDiaria * $diferencaDias;

    
    $sql = "INSERT INTO reserva (id_quarto) VALUES ('$id_quarto')";

    mysqli_query($conexao, $sql);




    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}
*/
?>

<?php require_once("cabecalho.php"); ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Reserva</title>
</head>

<body>

  <div class="container p-4">
    <div class="progress">
      <div class="progress-bar progress-bar-striped" style="background-color:#a70162; width: 66%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>

    </div>
    <br>
    <div class="card">
      <div class="card-header">
        <h2>Cadastrar Reserva</h2>
      </div>
      <div class="card-body">
        <?php if (isset($mensagem)) { ?>
          <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-square-check"></i>
            <?= $mensagem ?>
          </div>
        <?php } ?>

        <form method="post" id="form" name="form" action="cadastrarReserva3.php">
          <input type="hidden" name="id_hospede" value="<?= $_POST['id_hospede'] ?>">
          <input type="hidden" name="dataEntrada" value="<?= $_POST['dataEntrada'] ?>">
          <input type="hidden" name="dataSaida" value="<?= $_POST['dataSaida'] ?>">
          <input type="hidden" name="quantHospede" value="<?= $_POST['quantHospede'] ?>">
          <input type="hidden" name="observacao" value="<?= $_POST['observacao'] ?>">
          <div class="row">
            <div class="mb-3 col-md">
              <label for="dataEntrada" class="form-label">Data da Entrada:</label>
              <label for="dataEntrada" class="form-control">
                <?php
                // Obtém a data do formulário
                $dataEntrada = $_POST['dataEntrada'];

                // Converte a data para o formato desejado (dd/mm/ano)
                $dataFormatada = date('d/m/Y', strtotime($dataEntrada));

                // Exibe a data formatada
                echo $dataFormatada;
                ?>
              </label>
            </div>
            <div class="mb-3 col-md">
              <label for="dataSaida" class="form-label">Data da Saída:</label>
              <label for="dataSaida" class="form-control">
                <?php
                // Obtém a data do formulário
                $dataSaida = $_POST['dataSaida'];

                // Converte a data para(dd/mm/ano)
                $dataFormatada = date('d/m/Y', strtotime($dataSaida));

                // Exibe a data formatada
                echo $dataFormatada;
                ?>
              </label>
            </div>

            <div class="mb-3 col-md">
              <label for="id_quarto" class="form-label">Quarto:</label>
              <select name="id_quarto" id="id_quarto" class="form-select" required>
                <option value="" disabled selected> Selecione</option>

                <?php
                $dataEntrada = $_POST['dataEntrada'];
                $dataSaida = $_POST['dataSaida'];
                $quantHospede = $_POST['quantHospede'];
                $sql = "SELECT quarto.* 
                FROM quarto
                WHERE quarto.id NOT IN (
                        SELECT reserva.id_quarto 
                        FROM reserva 
                        WHERE (dataEntrada BETWEEN '$dataEntrada' AND '$dataSaida')
                            OR (dataSaida BETWEEN '$dataEntrada' AND '$dataSaida')
                    )
                AND quarto.capacidade >= $quantHospede
                ORDER BY quarto.numero";

                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                ?>

                  <option value="<?= $linha['id'] ?>">N°
                    <?= $linha['numero'] . " - Tipo: " . $linha['tipo'] . " - Capacidade: " . $linha['capacidade'] ?>
                  </option>

                <?php } ?>
              </select>
            </div>
          </div>

          <button name="proximo" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Próximo
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </form>
      </div>
    </div>

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

</html>