<?php

require_once("verificaAutenticacao.php");

// Conectar no BD (IP, usuário, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');



if (isset($_POST['cadastrar'])) {
  // Receber os dados para inserir no BD
  $id_hospede = $_POST['id_hospede'];
  $id_quarto = $_POST['id_quarto'];
  $dataEntrada = $_POST['dataEntrada'];
  $dataSaida = $_POST['dataSaida'];
  $valorTotalReserva = $_POST['valorTotalReserva'];
  $observacao = $_POST['observacao'];

  // Preparar a SQL para inserir os dados da reserva
  $sql = "INSERT INTO reserva (id_hospede, id_quarto, dataEntrada, dataSaida, valorTotalReserva, observacao) VALUES ('$id_hospede', '$id_quarto', '$dataEntrada', '$dataSaida', '$valorTotalReserva', '$observacao')";

  // Executar a SQL para inserção
  mysqli_query($conexao, $sql);

  //5. Mostrar uma mensagem ao usuário
  $mensagem = "Registro salvo com sucesso.";
}

// Seu HTML e o restante do código devem continuar aqui
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

        <form method="post">
          <div class="row">
            <div class="mb-3 col">
              <label for="id_hospede" class="form-label">Hóspede:</label>
              <select name="id_hospede" id="id_hospede" class="form-select">
                <option value="">-- Selecione--</option>

                <?php
                $sql = "select * from hospede order by nome";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>">
                    <?= $linha['nome'] ?>
                  </option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3 col">
              <label for="dataEntrada" class="form-label">Data da Entrada:</label>
              <input type="date" class="form-control" name="dataEntrada">
            </div>
            <div class="mb-3 col">
              <label for="dataSaida" class="form-label">Data da Saída:</label>
              <input type="date" class="form-control" name="dataSaida">
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col">

              <label for="id_quarto" class="form-label">Quarto:</label>
              <select name="id_quarto" id="id_quarto" class="form-select">
                <option value="">-- Selecione--</option>

                <?php
                $sql = "select * from quarto order by numero";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>">
                    <?= $linha['numero'] ?>
                  </option>

                <?php } ?>
              </select>
            </div>

            <div class="mb-3 col">
              <label for="valorTotalReserva" class="form-label">Valor Total da Reserva:</label>
              <input type="text" class="form-control" name="valorTotalReserva" id="valorReserva">
            </div>
          </div>


          <div class="mb-3">
            <label for="observacao" class="form-label">Observação:</label>
            <input class="form-control" id="observacao" name="observacao" placeholder="Nome dos demais integrantes">
          </div>
      <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Cadastrar
        <i class="fa-solid fa-check"></i>
      </button>
      </form>
    </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#valorConsumo').mask("#.##0,00", { reverse: true });
    $('#valorReserva').mask("#.##0,00", { reverse: true });
    $('#valorR').mask("#.##0,00", { reverse: true });
  </script>
</body>

</html>