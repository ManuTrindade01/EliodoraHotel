<?php

require_once("verificaAutenticacao.php");

// Conectar no BD (IP, usuário, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');



if (isset($_POST['salvar'])) {
    // Receber os dados para inserir no BD
    $id = $_POST['id'];
    $id_hospede = $_POST['id_hospede'];
    $id_quarto = $_POST['id_quarto'];
    $dataEntrada = $_POST['dataEntrada'];
    $dataSaida = $_POST['dataSaida'];
    $valorTotalReserva = str_replace(',', '.', $_POST['valorTotalReserva']);
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];

    // Preparar a SQL para inserir os dados da reserva
    $sql = "update reserva
                set id_hospede  = '$id_hospede',
                    id_quarto = '$id_quarto',
                    dataEntrada = '$dataEntrada',
                    dataSaida = '$dataSaida',
                    valorTotalReserva = '$valorTotalReserva',
                    observacao = '$observacao',
                    status = '$status'
                where id  = $id";

    // Executar a SQL para inserção
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";
}

$sql = "select * from reserva where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
// Seu HTML e o restante do código devem continuar aqui
?>


<?php require_once("cabecalho.php"); ?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Reserva</title>
</head>

<body>



    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h2>Alterar Reserva</h2>
            </div>
            <div class="card-body">
                <?php if (isset($mensagem)) { ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-square-check"></i>
                        <?= $mensagem ?>
                    </div>
                <?php } ?>

                <form method="post">
                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">


                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="id_hospede" class="form-label">Hóspede:</label>
                            <select name="id_hospede" id="id_hospede" class="form-select">
                                <option value="">-- Selecione--</option>

                                <?php
                                $sql = "select * from hospede order by nome";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaTU = mysqli_fetch_array($resultado)):
                                    $id = $linhaTU['id'];
                                    $nome = $linhaTU['nome'];

                                    $selected = ($id == $linha['id_hospede']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$nome}</option>";
                                endwhile;
                                ?>

                            </select>
                        </div>

                        <div class="mb-3 col-md">
                            <label for="dataEntrada" class="form-label">Data da Entrada:</label>
                            <input type="date" class="form-control" name="dataEntrada"
                                value="<?= $linha['dataEntrada'] ?>">
                        </div>
                        <div class="mb-3 col-md">
                            <label for="dataSaida" class="form-label">Data da Saída:</label>
                            <input type="date" class="form-control" name="dataSaida" value="<?= $linha['dataSaida'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="id_quarto" class="form-label">Quarto:</label>
                            <select name="id_quarto" id="id_quarto" class="form-select">
                                <option value="">-- Selecione--</option>

                                <?php
                                $sql = "select * from quarto order by numero";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaTU = mysqli_fetch_array($resultado)):
                                    $id = $linhaTU['id'];
                                    $numero = $linhaTU['numero'];

                                    $selected = ($id == $linha['id_quarto']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$numero}</option>";
                                endwhile;
                                ?>

                            </select>
                        </div>

                        <div class="mb-3 col-md">
                            <label for="valorTotalReserva" class="form-label">Valor Total da Reserva:</label>
                            <input type="text" class="form-control" name="valorTotalReserva" id="valorReserva"
                                value="<?= $linha['valorTotalReserva'] ?>">
                        </div>

                        <div class="mb-3 col-md">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" <?= ($linha['status'] == '1') ? 'selected' : '' ?>>Pendente</option>
                                <option value="2" <?= ($linha['status'] == '2') ? 'selected' : '' ?>>Em andamento</option>
                                <option value="3" <?= ($linha['status'] == '3') ? 'selected' : '' ?>>Finalizado - A pagar</option>
                                <option value="4" <?= ($linha['status'] == '4') ? 'selected' : '' ?>>Finalizado - Pago</option>
                                <option value="5" <?= ($linha['status'] == '5') ? 'selected' : '' ?>>Cancelado</option>
                            </select>
                        </div>

                    <div class="mb-3 col-md">
                        <label for="observacao" class="form-label">Observação:</label>
                        <input class="form-control" id="observacao" name="observacao"
                            value="<?= $linha['observacao'] ?>">
                    </div>
                    </div>

                    <button name="salvar" type="submit" class="btn"
                        style="background-color: #a70162; color: #fff;">Salvar
                        <i class="fa-solid fa-check"></i>
                    </button>
                    <a href="controlarReserva.php" type="submit" class="btn btn-warning"><i
                            class="fa-solid fa-rotate-left"></i></i>
                        Voltar</a>

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
        <script>
        // Função para exibir a mensagem de confirmação
        window.onbeforeunload = function() {
            return "Você tem certeza que deseja sair desta página? Suas informações não serão salvas.";
        };
       
        // Lógica para remover a mensagem de confirmação quando o formulário for enviado
        document.querySelector('form').addEventListener('submit', function() {
            window.onbeforeunload = null;
        });
    </script>
</body>

</html>