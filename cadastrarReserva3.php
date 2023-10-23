<?php
require_once("verificaAutenticacao.php");
require_once("conexao.php");

var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    
  $id_quarto = $_POST['id_quarto'];

  $sql = "INSERT INTO reserva (id_quarto) VALUES ('$id_quarto')";

  mysqli_query($conexao, $sql);

 //5. Mostrar uma mensagem ao usuário
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
            <div class="card-body">
                <?php if (isset($mensagem)) { ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-square-check"></i>
                        <?= $mensagem ?>
                    </div>
                <?php } ?>
                <div>

                    Valor total da reserva:
                    <?= $valorTotalReserva; ?>
                </div>

</html>