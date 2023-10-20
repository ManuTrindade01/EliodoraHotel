<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");
require_once("cadastrarReserva2.php");


var_dump($_POST);


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

                <form method="post" id="form" name="form">

                <div class="mb-3 col">

              <label for="id_quarto" class="form-label">Quarto:</label>
              <select name="id_quarto" id="id_quarto" class="form-select">
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
            <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar
            <i class="fa-solid fa-check"></i>
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