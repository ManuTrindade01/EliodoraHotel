<?php
require_once("conexao.php");

$sql = "SELECT * from reserva where 1 = 1";

$sql = "SELECT reserva.*, hospede.nome as hospede_nome, quarto.numero as quarto_numero
FROM reserva
LEFT JOIN hospede ON hospede.id = reserva.id_hospede
LEFT JOIN quarto ON quarto.id = reserva.id_quarto
ORDER BY reserva.dataEntrada ASC";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>

<head>
    <title>Reservas</title>
    <link href="style.css" rel="stylesheet">

    
</head>

<?php require_once("cabecalho.php"); ?>

<body>
    <br>

    <div>
        <div class="row row-cols 1 row-cols-md-4 g-4">
            <?php while ($linha = mysqli_fetch_array($resultado)) { ?>


                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #a70162; font-family: 'Segoe UI'">QUARTO
                                <?= $linha['quarto_numero'] . "({$linha['id']})"  ?>
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nome Hóspede:
                                    <?= $linha['hospede_nome'] ?>
                                </li>
                                <li class="list-group-item">Data de entrada:
                                    <?= date('d/m/Y', strtotime($linha['dataEntrada'])) ?>
                                </li>
                                
                                <li class="list-group-item">Valor Total:
                                    <?= $linha['valorTotalReserva']?> R$
                                </li>
                                <li class="list-group-item">Ativo:
                                    <?= $linha['status'] ?>
                                </li>
                            </ul>

                            <a href="alterarReserva.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </div>
                    </div>

                </div>

            <?php } ?>
        </div>
    </div>
</body>


</html>