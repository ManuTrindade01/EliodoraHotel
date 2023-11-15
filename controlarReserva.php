<?php
// Função para retornar o nome do status com base no número
function getStatusName($statusNumber) {
    switch ($statusNumber) {
        case 1:
            return 'Pendente';
        case 2:
            return 'Em andamento';
        case 3:
            return 'Finalizado';
        case 4:
            return 'Cancelado';
        default:
            return 'Status Desconhecido';
    }
}

require_once("conexao.php");

?>

<!DOCTYPE html>
<head>
    <title>Reservas</title>
    <link href="style.css" rel="stylesheet">

    <style>
        /* style.css */

/* Estilos para o botão de filtragem */
.filter-button {
    padding: 8px 16px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    background-color: #a70162;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.filter-button:hover {
    background-color: #872850;
}

    </style>
</head>

<?php require_once("cabecalho.php"); ?>

<body>
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="statusSelect" >Filtrar por status:</label>
        <select name="status" id="statusSelect" >
            <option value="">Todos</option>
            <option value="1">Pendente</option>
            <option value="2">Em andamento</option>
            <option value="3">Finalizado</option>
            <option value="4">Cancelado</option>
        </select>
        <button type="submit" class="filter-button">Filtrar</button>
    </form>

    <div>
        <div class="row row-cols 1 row-cols-md-4 g-4">
            <?php
            // Reutilização da variável $conexao do arquivo conexão.php
            $filtroStatus = isset($_GET['status']) ? $_GET['status'] : '';

            $sql = "SELECT reserva.*, hospede.nome as hospede_nome, quarto.numero as quarto_numero
                    FROM reserva
                    LEFT JOIN hospede ON hospede.id = reserva.id_hospede
                    LEFT JOIN quarto ON quarto.id = reserva.id_quarto";

            if (!empty($filtroStatus)) {
                $sql .= " WHERE reserva.status = $filtroStatus";
            }

            $sql .= " ORDER BY reserva.dataEntrada ASC";

            $resultado = mysqli_query($conexao, $sql);

            // Verifica se a consulta foi bem-sucedida
            if ($resultado) {
                $reservas = []; // Array para armazenar as reservas

                // Armazena os resultados em uma matriz
                while ($linha = mysqli_fetch_array($resultado)) {
                    $reservas[] = $linha;
                }

                // Itera sobre as reservas para exibir os cartões de reserva
                foreach ($reservas as $reserva) {
                    ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #a70162; font-family: 'Segoe UI'">QUARTO
                                    <?= $reserva['quarto_numero'] ?>
                                </h5>
                                <label class="badge text-bg-primary"><?= getStatusName($reserva['status']) ?></label>

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nome Hóspede:
                                        <?= $reserva['hospede_nome'] ?>
                                    </li>
                                    <li class="list-group-item">Data de entrada:
                                        <?= date('d/m/Y', strtotime($reserva['dataEntrada'])) ?>
                                    </li>
                                    <li class="list-group-item">Data de Saída:
                                        <?= date('d/m/Y', strtotime($reserva['dataSaida'])) ?>
                                    </li>
                                    <li class="list-group-item">Valor Total: R$
                                        <?= number_format($reserva['valorTotalReserva'], 2, ',', '.') ?>
                                    </li>
                                </ul>

                                <a href="alterarReserva.php?id=<?= $reserva['id'] ?>" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Erro na consulta: " . mysqli_error($conexao);
            }
            ?>
        </div>
    </div>
</body>
</html>
