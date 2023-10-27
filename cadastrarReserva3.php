<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

    

// Calcular a quantidade de dias da reserva
//Arrumar só a diferença de dias
$diferencaDias = ($_POST['dataSaida'] - $_POST['dataEntrada']) / (60 * 60 * 24); // 60 segundos * 60 minutos * 24 horas

// Obter o valor da diária do quarto
$sqlQuarto = "SELECT valorDiaria FROM quarto WHERE id = ". $_POST['id_quarto'];
$resultadoQuarto = mysqli_query($conexao, $sqlQuarto);

$quarto = mysqli_fetch_assoc($resultadoQuarto);
$valorDiaria = $quarto['valorDiaria'];

// Calcular o valor total da reserva
$valorTotalReserva = $valorDiaria * $diferencaDias;

if (isset($_POST['cadastrar'])) {
    // Receber os dados para inserir no BD
    $id_hospede = $_POST['id_hospede'];
    $id_quarto = $_POST['id_quarto'];
    $dataEntrada = $_POST['dataEntrada'];
    $dataSaida = $_POST['dataSaida'];
    $quantHospede = $_POST['quantHospede'];
    $observacao = $_POST['observacao'];


    // Preparar a SQL para inserir os dados da reserva
    $sql = "INSERT INTO reserva 
    (dataEntrada, dataSaida, quantHospede, observacao, id_hospede, id_quarto) VALUES 
    ('$dataEntrada', '$dataSaida', '$quantHospede', '$observacao', '$id_hospede', '$id_quarto')";
    
    // Executar a SQL para inserção
    mysqli_query($conexao, $sql);

    $mensagem = "Registro salvo com sucesso.";
}

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
                <form method="post" id="form" name="form" action="cadastrarReserva4.php">
                    <input type="hidden" name="id_hospede" value="<?= $_POST['id_hospede'] ?>">
                    <input type="hidden" name="dataEntrada" value="<?= $_POST['dataEntrada'] ?>">
                    <input type="hidden" name="dataSaida" value="<?= $_POST['dataSaida'] ?>">
                    <input type="hidden" name="quantHospede" value="<?= $_POST['quantHospede'] ?>">
                    <input type="hidden" name="observacao" value="<?= $_POST['observacao'] ?>">
                    <input type="hidden" name="id_quarto" value="<?= $_POST['id_quarto'] ?>">
                    <div>
                        <label for="dataEntrada" class="form-label">Data da reserva:</label>
                        <label for="dataEntrada" class="form-label">
                            <?= $_POST['dataEntrada'] ?> até
                            <?= $_POST['dataSaida'] ?>
                        </label>
                        <br>
                        <label for="id_quarto" class="form-label">Quarto:</label>
                        <?= $_POST['id_quarto'] ?>
                        <br>
                        Valor total da reserva: <?=$valorTotalReserva?>
                        <br>
                        <button name="cadastrar" type="submit" class="btn"
                            style="background-color: #a70162; color: #fff;">Confirmar reserva
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</html>