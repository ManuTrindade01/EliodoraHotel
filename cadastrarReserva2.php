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
    <title>Cadastrar Reserva</title>
</head>

<body>

    <div class="container p-4">
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

                <form method="post" id="form" name="form" action="cadastrarReserva3.php" >
                  <input type="hidden" name="id_hospede" value="<?= $_POST['id_hospede'] ?>">
                  <input type="hidden" name="dataEntrada" value="<?= $_POST['dataEntrada'] ?>">
                  <input type="hidden" name="dataSaida" value="<?= $_POST['dataSaida'] ?>">
                  <input type="hidden" name="quantHospede" value="<?= $_POST['quantHospede'] ?>">
                  <input type="hidden" name="observacao" value="<?= $_POST['observacao'] ?>">

                  <label for="dataEntrada" class="form-label">Data da reserva:</label>
                  <label for="dataEntrada" class="form-label"><?= $_POST['dataEntrada'] ?> até <?= $_POST['dataSaida'] ?></label>

                <div class="mb-3 col">
                

              <label for="id_quarto" class="form-label">Quarto:</label>
              <select name="id_quarto" id="id_quarto" class="form-select" required>
                <option value="" disabled selected>-- Selecione--</option>

                <?php
                $sql = "select quarto.* 
                          from quarto
                         where quarto.id not in (
                                select reserva.id_quarto 
                                  from reserva 
                                 where dataEntrada BETWEEN '{$_POST['dataEntrada']}' and '{$_POST['dataSaida']}'
                                    or dataSaida BETWEEN '{$_POST['dataEntrada']}' and '{$_POST['dataSaida']}'
                                )
                      order by quarto.numero";
                
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>">
                    <?= $linha['numero'] . " - " . $linha['tipo'] ?>
                  </option>

                <?php } ?>
              </select>
            </div>
            <button name="proximo" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Próximo
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </form>
        </div>
    </div>

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

    </html>