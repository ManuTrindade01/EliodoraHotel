<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

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
  <div class="progress">
  <div class="progress-bar progress-bar-striped" style="background-color:#a70162; width: 33%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
  
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

        <form method="post" id="form" name="form" action="cadastrarReserva2.php" onsubmit="return validaForm(form)">
          <div class="row">
            <div class="mb-3 col-md">
              <label for="id_hospede" class="form-label">Hóspede Responsável:</label>
              <select name="id_hospede" id="id_hospede" class="form-select" required>
                <option value=""> Selecione</option>

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

            <div class="mb-3 col-md">
              <label for="dataEntrada" class="form-label">Data da Entrada:</label>
              <input type="date" class="form-control" name="dataEntrada" id="dataEntrada"
                min="<?php echo date('Y-m-d') ?>" required>
            </div>
            <div class="mb-3 col-md">
              <label for="dataSaida" class="form-label">Data da Saída:</label>
              <input type="date" class="form-control" name="dataSaida" id="dataSaida"
              min="<?php echo date('Y-m-d',strtotime('+1 days')) ?>" required>
            </div>
          </div>
          <!--
          <div class="row">
            <div class="mb-3 col">

              <label for="id_quarto" class="form-label">Quarto:</label>
              <select name="id_quarto" id="id_quarto" class="form-select">
                <option value="">-- Selecione--</option>
                  
                <?php
                /*
                $sql = "select * from quarto order by numero";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_array($resultado)) {
                  ?>

                  <option value="<?= $linha['id'] ?>">
                    <?= $linha['numero'] . " - " . $linha['tipo'] ?>
                  </option>
               
                <?php } */?>
              </select>
            </div>
                -->
          <div class="row">
            <div class="mb-3 col-md-2">
              <label for="quantHospede" class="form-label">Número Hóspedes:</label>
              <select name="quantHospede" class="form-select" aria-label="Default select example" id="quantHospede"
                required>
                <option value="" disabled selected>Selecione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>


            <div class="mb-3 col-md">
              <label for="observacao" class="form-label">Observação:</label>
              <input class="form-control" id="observacao" name="observacao" placeholder="Nome dos demais integrantes">
            </div>
          </div>


          <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Próximo
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </form>
      </div>
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
    function validaForm(form) {
    console.log("Validação do formulário acionada!");
    var dataEntrada = new Date(document.getElementById("dataEntrada").value);
    var dataSaida = new Date(document.getElementById("dataSaida").value);

    // Verifica se as datas são válidas
    if (isNaN(dataEntrada.getTime()) || isNaN(dataSaida.getTime())) {
        alert("Por favor, insira datas válidas no formato correto.");
        return false;
    }

    // Compara as datas
    if (dataSaida <= dataEntrada) {
        alert("A data de saída deve ser posterior à data de entrada.");
        return false; // Impede o envio do formulário
    }

    // Continue com o envio do formulário se a validação passar
    return true;
}


  </script>

</body>

</html>