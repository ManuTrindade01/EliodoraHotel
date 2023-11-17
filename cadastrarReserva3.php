<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");



// Calcular a quantidade de dias da reserva
//Arrumar só a diferença de dias

$dataEntrada = strtotime($_POST['dataEntrada']);
$dataSaida = strtotime($_POST['dataSaida']);
$diferencaSegundos = $dataSaida - $dataEntrada;
$diferencaDias = intval($diferencaSegundos / (60 * 60 * 24));

// Obter o valor da diária do quarto
$sqlQuarto = "SELECT valorDiaria FROM quarto WHERE id = " . $_POST['id_quarto'];
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
    (dataEntrada, dataSaida, quantHospede, observacao, id_hospede, id_quarto, valorTotalReserva) VALUES 
    ('$dataEntrada', '$dataSaida', '$quantHospede', '$observacao', '$id_hospede', '$id_quarto', '$valorTotalReserva')";

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
        <div class="card">


            <div class="card-header">
                <h2>Cadastrar Reserva</h2>

            </div>
            <?php if (isset($mensagem)) { ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-square-check"></i>
                    <?= $mensagem ?>
                </div>

            <?php } ?>
            <div class="card-body">
                <form method="post" id="form" name="form">
                    <input type="hidden" name="id_hospede" value="<?= $_POST['id_hospede'] ?>">
                    <input type="hidden" name="dataEntrada" value="<?= $_POST['dataEntrada'] ?>">
                    <input type="hidden" name="dataSaida" value="<?= $_POST['dataSaida'] ?>">
                    <input type="hidden" name="quantHospede" value="<?= $_POST['quantHospede'] ?>">
                    <input type="hidden" name="observacao" value="<?= $_POST['observacao'] ?>">
                    <input type="hidden" name="id_quarto" value="<?= $_POST['id_quarto'] ?>">
                    <div class="row">
                        <div class="col">
                            Data de Entrada:
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
                        <div class="col">
                            Data de Saída:
                            <label for="dataSaida" class="form-control">
                                <?php
                                // Obtém a data do formulário
                                $dataSaida = $_POST['dataSaida'];

                                // Converte a data para o formato desejado (dd/mm/ano)
                                $dataFormatada = date('d/m/Y', strtotime($dataSaida));

                                // Exibe a data formatada
                                echo $dataFormatada;
                                ?>
                        </div>
                        <br>
                        <br>
                        <div class="col">
                            Quarto:
                            <label for="id_quarto" class="form-control">
                                <?= $_POST['id_quarto'] ?>
                            </label>
                            <br>
                        </div>
                        <div class="col">
                            Valor total da reserva:
                            <label for="" class="form-control" id="valorTotalReserva">
                                <?= $valorTotalReserva ?>
                            </label>
                        </div>
                        <br>
                    </div>
                    <button name="cadastrar" type="submit" class="btn"
                        style="background-color: #a70162; color: #fff;">Confirmar reserva
                        <i class="fa-solid fa-check"></i>
                    </button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script>
        $('#valorTotalReserva').mask("#.##0,00", {
            reverse: true
        });
    </script>

</html>