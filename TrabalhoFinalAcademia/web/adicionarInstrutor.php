<?php
require_once("cabecalho.php");
require_once("../classes/Instrutor.php");
if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'])) {
        $msg = base64_encode("Preencha todos os campos!");
        header("Location: adicionarInstrutor.php?error=" . $msg);
    } else {

        $nome = $_POST['nome'];
        if (empty($nome)) {
            $msg = base64_encode("Preencha todos os campos!");
            header("Location: adicionarInstrutor.php?error=" . $msg);
        } else {
            $instrutor = new Instrutor();
            $instrutor->setNome($nome);
            if (isset($_POST['certificacao'])) {

                foreach ($_POST['certificacao'] as $certificacao => $c) {
                    if (!empty($c))
                        $instrutor->addCertificacao($c);
                }
            }
            if (isset($_POST['especializacao'])) {
                foreach ($_POST['especializacao'] as $especializacao => $e) {
                    if (!empty($e))
                        $instrutor->addEspecializacao($e);
                }
            }
            if ($instrutor->inserirInstrutor()) {
                $msg = base64_encode("Instrutor Adicionado!");
                header("Location: exibirInstrutores.php?msg=" . $msg . "&instrid=" . $instrutor->getId());
            } else {
                $msg = base64_encode("Erro ao inserir instrutor!");
                header("Location: exibirInstrutores.php?error=" . $msg);
            }
        }
    }
} ?>
<h1 class="text-bg-dark p-1 m-2">Adicionar Instrutor</h1>
<div class="text-bg-dark p-3">
    <form action="adicionarInstrutor.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group m-2">
            <p>Certificações:</p>
            <div id="row">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger" id="DeleteCertificacao" type="button">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control mb-1" id="certificacao" name="certificacao[]">
                </div>
            </div>

            <div id="newinputcertificacao"></div>
            <button id="rowAdderCertificacao" type="button" class=" btn btn btn-info mt-2">
                <i class="fas fa-plus-circle"></i>
            </button>


        </div>
        <div class="form-group m-2">
            <p>Especializações:</p>
            <div id="row">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger" id="DeleteEspecializacao" type="button">
                            <i class="fas fa-trash-alt"></i>

                        </button>
                    </div>
                    <input type="text" class="form-control mb-1" id="especializacao" name="especializacao[]">
                </div>
            </div>

            <div id="newinputespecializacao"></div>
            <button id="rowAdderEspecializacao" type="button" class="btn btn btn-info mt-2">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-2">Adicionar Instrutor</button>
    </form>

    <script type="text/javascript">
        $("#rowAdderCertificacao").click(function() {
            newRowAdd =
                '<div id="row"> <div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteCertificacao" type="button">' +
                '<i class="fas fa-trash-alt"></i></button> </div>' +
                '<input type="text" class="form-control mb-1" id="certificacao" name="certificacao[]"> </div> </div>';

            $('#newinputcertificacao').append(newRowAdd);
        });
        $("body").on("click", "#DeleteCertificacao", function() {
            $(this).parents("#row").remove();
        })

        $("#rowAdderEspecializacao").click(function() {
            newRowAdd =
                '<div id="row"> <div class="input-group">' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteEspecializacao" type="button">' +
                '<i class="fas fa-trash-alt"></i></button> </div>' +
                '<input type="text" class="form-control mb-1" id="especializacao" name="especializacao[]"> </div> </div>';

            $('#newinputespecializacao').append(newRowAdd);
        });
        $("body").on("click", "#DeleteEspecializacao", function() {
            $(this).parents("#row").remove();
        })
    </script>

    <?php
    require_once("rodape.php");
    ?>