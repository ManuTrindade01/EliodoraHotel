<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");


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
  
      $mensagem = "Registro salvo com sucesso.";
} 

//consultar o quarto e o valor

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

        <!-- mensagem em bootstrap -->

        <div class="card">
            <div class="card-header">
                <h2>Cadastrar Reserva</h2>
            </div>
            <div class="card-body">
                <form method="post" id="form" name="form" action="cadastrarReserva3.php" >
                    <input type="hidden" name="id_hospede" value="<?= $_POST['id_hospede'] ?>">
                    <input type="hidden" name="dataEntrada" value="<?= $_POST['dataEntrada'] ?>">
                    <input type="hidden" name="dataSaida" value="<?= $_POST['dataSaida'] ?>">
                    <input type="hidden" name="quantHospede" value="<?= $_POST['quantHospede'] ?>">
                    <input type="hidden" name="observacao" value="<?= $_POST['observacao'] ?>">
                    <div>
                        <label for="dataEntrada" class="form-label">Data da reserva:</label>
                        <label for="dataEntrada" class="form-label"><?= $_POST['dataEntrada'] ?> até <?= $_POST['dataSaida'] ?></label>
                        <br>
                        Quarto...
                        <br>
                        Valor total da reserva:
                        <br>
                        <button name="cadastrar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Confirmar reserva
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</html>