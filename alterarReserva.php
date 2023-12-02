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
    $quantHospede = $_POST['quantHospede'];
    $valorTotalReserva = str_replace(',', '.', $_POST['valorTotalReserva']);
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];


    $dataAtual = date('Y-m-d');
    /*
    if($status == 5) { //Cancelado
        //Não faz nada
    } elseif ($dataAtual < $dataEntrada) { // "Futuro" se a data atual for anterior à data de entrada
        $status = 1;
        $mensagemErro = "";
    } elseif ($dataAtual >= $dataEntrada && $dataAtual <= $dataSaida) {
        $status = 2; // "Em andamento" se a data atual estiver entre entrada e saída
    } else {
        */
    // Verificar se o status não é finalizado e se a data atual não é posterior à data de saída
    if (($status == 1 || $status == 2) && $dataAtual >= $dataEntrada) {
        $mensagemErro = "Data de hoje é posterior à data de Entrada.";
    }
    if (($status == 4) && $dataAtual < $dataSaida) {
        //$status = 2; // Manter como "Em andamento"
        $mensagemErro = "Data de hoje não é posterior à data de saída.";
    }

    // Restrição para evitar atualizar o status para "Finalizado" se a data atual for anterior à data de saída

    if (!isset($mensagemErro)) {
        // Preparar a SQL para inserir os dados da reserva
        $sql = "update reserva
                    set id_hospede  = '$id_hospede',
                        id_quarto = '$id_quarto',
                        dataEntrada = '$dataEntrada',
                        dataSaida = '$dataSaida',
                        quantHospede = '$quantHospede',
                        valorTotalReserva = '$valorTotalReserva',
                        observacao = '$observacao',
                        status = '$status'
                    where id  = $id";

        // Executar a SQL para inserção
        mysqli_query($conexao, $sql);

        //5. Mostrar uma mensagem ao usuário
        $mensagem = "Registro salvo com sucesso.";
    }
}

$sql = "SELECT * from reserva where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);
// Seu HTML e o restante do código devem continuar aqui
?>


<?php require_once("cabecalho.php"); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="barbara.ico" type="image/x-icon">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/b78968e6be.js" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Slab:ital@1&family=Sorts+Mill+Goudy&family=Unna:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">

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
                <?php if (isset($mensagemErro)) { ?>
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-square-check"></i>
                        <?= $mensagemErro ?>
                    </div>
                <?php } ?>
                <?php if (isset($mensagem)) { ?>
                    <div class="alert alert-success" role="alert">
                        <i class="fa-solid fa-square-check"></i>
                        <?= $mensagem ?>
                    </div>
                <?php } ?>

                <form method="post" action="alterarReserva.php?id=<?= $linha['id'] ?>" id="form" name="form" onsubmit="return validaForm(form)">
                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">


                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="id_hospede" class="form-label">Hóspede:</label>
                            <select name="id_hospede" id="id_hospede" class="form-select">
                                <option value="">-- Selecione--</option>

                                <?php
                                $sql = "select * from hospede order by nome";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaTU = mysqli_fetch_array($resultado)) :
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
                            <input type="date" class="form-control" name="dataEntrada" id="dataEntrada" value="<?= $linha['dataEntrada'] ?>" min="<?php echo date('Y-m-d') ?>">
                        </div>
                        <div class="mb-3 col-md">
                            <label for="dataSaida" class="form-label">Data da Saída:</label>
                            <input type="date" class="form-control" name="dataSaida" id="dataSaida" value="<?= $linha['dataSaida'] ?>" min="<?php echo date('Y-m-d') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-md">
                            <label for="id_quarto" class="form-label">Quarto:</label>
                            <select name="id_quarto" id="id_quarto" class="form-select">
                                <option value="" disabled>-- Selecione--</option>

                                <?php
                                $sql = "select quarto.* 
                                from quarto
                               where quarto.id not in (
                                      select reserva.id_quarto 
                                        from reserva 
                                       where dataEntrada BETWEEN '{$_POST['dataEntrada']}' and '{$_POST['dataSaida']}'
                                          or dataSaida BETWEEN '{$_POST['dataEntrada']}' and '{$_POST['dataSaida']}'
                                      )
                            order by quarto.numero";
                                $resultado = mysqli_query($conexao, $sql);

                                while ($linhaTU = mysqli_fetch_array($resultado)) :
                                    $id = $linhaTU['id'];
                                    $numero = $linhaTU['numero'];

                                    $selected = ($id == $linha['id_quarto']) ? 'selected' : '';

                                    echo "<option value='{$id}' {$selected}>{$numero}</option>";
                                endwhile;
                                ?>

                            </select>
                        </div>

                        <div class="mb-3 col-md">
                            <label for="valorTotalReserva" class="form-label">Valor Reserva:</label>

                            <input type="text" class="form-control" name="valorTotalReserva" id="valorReserva" value="<?= $linha['valorTotalReserva'] ?>">
                        </div>

                        <div class="mb-3 col-md">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="1" <?= ($linha['status'] == '1') ? 'selected' : '' ?>>Futuro</option>
                                <option value="2" <?= ($linha['status'] == '2') ? 'selected' : '' ?>>Futuro - Pago</option>
                                <option value="3" <?= ($linha['status'] == '3') ? 'selected' : '' ?>>Em andamento</option>
                                <option value="4" <?= ($linha['status'] == '4') ? 'selected' : '' ?>>Finalizado - Pago</option>
                                <option value="5" <?= ($linha['status'] == '5') ? 'selected' : '' ?>>Cancelado</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md">
                            <label for="observacao" class="form-label">Observação:</label>
                            <input class="form-control" id="observacao" name="observacao" value="<?= $linha['observacao'] ?>">
                        </div>
                        <div class="mb-3 col-md">
                            <label for="quantHospede" class="form-label">Quantidade:</label>
                            <select class="form-control" id="quantHospede" name="quantHospede">
                                <option value="" disabled>Selecione</option>
                                <option value="1" <?= ($linha['quantHospede'] == '1') ? 'selected' : '' ?>>1</option>
                                <option value="2" <?= ($linha['quantHospede'] == '2') ? 'selected' : '' ?>>2</option>
                                <option value="3" <?= ($linha['quantHospede'] == '3') ? 'selected' : '' ?>>3</option>
                                <option value="4" <?= ($linha['quantHospede'] == '4') ? 'selected' : '' ?>>4</option>
                                <option value="5" <?= ($linha['quantHospede'] == '5') ? 'selected' : '' ?>>5</option>
                            </select>

                        </div>
                    </div>

                    <button name="salvar" type="submit" class="btn" style="background-color: #a70162; color: #fff;">Salvar
                        <i class="fa-solid fa-check"></i>
                    </button>
                    <a href="controlarReserva.php" type="submit" class="btn btn-warning"><i class="fa-solid fa-rotate-left"></i></i>
                        Voltar</a>

                </form>
            </div>
        </div>
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
                if (dataSaida < dataEntrada) {
                    alert("A data de saída deve ser posterior à data de entrada.");
                    return false; // Impede o envio do formulário
                }

                // Continue com o envio do formulário se a validação passar
                return true;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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