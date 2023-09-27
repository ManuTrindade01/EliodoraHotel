<?php
require_once("verificaAutenticacao.php");
//1. Conectar no BD (IP, usuario, senha, nome do banco)
$conexao = mysqli_connect('127.0.0.1', 'root', '', 'tcc');


if (isset($_POST['salvar'])) {
    //2. Receber os dados para inserir no BD
    $id = $_POST['id'];
    $id_marca = $_POST['id_marca'];
    $id_tipo = $_POST['id_tipo'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $valorUnitario = $_POST['valorUnitario'];

    //3. Preparar a SQL
    $sql = "UPDATE tipo
                set nome  = '$nome',
                    id_marca = '$id_marca',
                    id_tipo = '$id_tipo',
                    quantidade = '$quantidade',
                    valorUnitario = '$valorUnitario'
                where id  = $id";

    //4. Executar a SQL
    mysqli_query($conexao, $sql);

    //5. Mostrar uma mensagem ao usuário
    $mensagem = "Registro salvo com sucesso.";



}

//Busca usuário selecionado pelo "listarQuarto.php"
$sql = "SELECT * from produto where id = " . $_GET['id'];
$resultado = mysqli_query($conexao, $sql);
$linha = mysqli_fetch_array($resultado);

?>

<?php require_once("cabecalho.php"); ?>



<div class="container p-4">
    <div class="card">
        <div class="card-header">
            <h2>Alterar Produto</h2>
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
                <div class="mb-3 col-6">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="<?= $linha['nome'] ?>">
                </div>
                <div class="mb-3 col">
                    <label for="quantidade" class="form-label">Quantidade:</label>
                    <input type="text" class="form-control" name="quantidade" value="<?= $linha['quantidade'] ?>">
                </div>
                <div class="mb-3 col">
                    <label for="valorUnitario" class="form-label">Valor Unitário:</label>
                    <input type="text" class="form-control" name="valorUnitario" value="<?= $linha['valorUnitario'] ?>">
                    </div>
                </div>
                <div class="row">
                <div class="mb-3 col">
                    <label for="id_marca" class="form-label">Marca:</label>
                    <select name="id_marca" id="id_marca" class="form-select">
                        <option value="">-- Selecione--</option>

                        <?php
                        $sql = "select * from marca order by nome";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($linhaTU = mysqli_fetch_array($resultado)):
                            $id = $linhaTU['id'];
                            $nome = $linhaTU['nome'];

                            $selected = ($id == $linha['id_marca']) ? 'selected' : '';

                            echo "<option value='{$id}' {$selected}>{$nome}</option>";
                        endwhile;
                        ?>

                    </select>
                </div>
                <div class="mb-3 col">
                    <label for="id_tipo" class="form-label">Categoria:</label>
                    <select name="id_tipo" id="id_tipo" class="form-select">
                        <option value="">-- Selecione--</option>

                        <?php
                        $sql = "select * from tipo order by nome";
                        $resultado = mysqli_query($conexao, $sql);

                        while ($linhaTU = mysqli_fetch_array($resultado)):
                            $id = $linhaTU['id'];
                            $nome = $linhaTU['nome'];

                            $selected = ($id == $linha['id_tipo']) ? 'selected' : '';

                            echo "<option value='{$id}' {$selected}>{$nome}</option>";
                        endwhile;
                        ?>

                    </select>
                </div>
                </div>
                <button name="salvar" type="submit" style="background-color: #a70162; color: #fff" class="btn"><i
                        class="fa-solid fa-check"></i> Salvar</button>

                <a href="listarTipo.php" type="submit" class="btn btn-warning"><i
                        class="fa-solid fa-rotate-left"></i></i>
                    Voltar</a>
                </button>

            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('#valorUnitario').mask("#.##0,00", { reverse: true });
  </script>
</body>

</html>