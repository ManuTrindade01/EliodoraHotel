<?php
require_once("conexao.php");

$sql = "SELECT * from reserva where 1 = 1";

$sql = "select reserva.*, hospede.nome as hospede_nome, quarto.numero as quarto_numero
 from reserva
 left join hospede on hospede.id = reserva.id_hospede
 left join quarto on quarto.id = reserva.id_quarto";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>

<head>
    <title>Reservas</title>
    <link href="style.css" rel="stylesheet">

    <style>
        .containercard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px 0;
        }

        .card {

            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin: 10px;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .list-group-item {
            border: none;
            padding: 5px 0;
        }

        .card-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #fff;
            background-color: #a70162;
            padding: 10px 0;
            text-decoration: none;
            border-radius: 5px;
        }

        .card-link:hover {
            background-color: #82044b;
        }

        .card-vermelho {
            background-color: #ffcccc;
            /* ou qualquer outra cor vermelha que desejar */
        }

        .card-verde {
            background-color: #ccffcc;
            /* ou qualquer outra cor verde que desejar */
        }
    </style>
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
                                <?= $linha['quarto_numero'] ?> 
                            </h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nome Hóspede:
                                    <?= $linha['hospede_nome'] ?>
                                </li>
                                <li class="list-group-item">Data de entrada:
                                    <?= date('d/m/Y', strtotime($linha['dataEntrada'])) ?>
                                </li>
                                <li class="list-group-item">Data saída:
                                    <?= date('d/m/Y', strtotime($linha['dataSaida'])) ?>
                                </li>
                                <li class="list-group-item">Ativo:
                                    <?= $linha['status'] ?>
                                </li>
                            </ul>

                            <a href="alterarReserva.php?id=<?= $linha['id'] ?>" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>Alterar
                            </a>
                        </div>
                    </div>

                </div>

            <?php } ?>
        </div>
    </div>
</body>


</html>