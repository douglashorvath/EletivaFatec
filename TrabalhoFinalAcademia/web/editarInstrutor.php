<?php
require_once("cabecalho.php");
require_once("../classes/Instrutor.php");
if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'])) {
        echo "Preencha todos os campos!";
    } else {

        $nome = $_POST['nome'];
        if (empty($nome)) {
            echo "Preencha todos os campos!";
        } else {

            $instrid = $_POST['instrid'];

            $instrutor = Instrutor::getInstrutor($instrid);
            $instrutor->setNome($nome);
            $instrutor->setEspecializacoes(array());
            $instrutor->setCertificacoes(array());
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
            if ($instrutor->salvarAlteracoes()) {
                $msg = base64_encode("Alterações Salvas!");
                header("Location: exibirInstrutores.php?msg=" . $msg . "&instrid=" . $instrutor->getId());
            } else {
                $msg = base64_encode("Erro ao salvar alterações!");
                header("Location: exibirInstrutores.php?error=" . $msg);
            }
        }
    }
} else {
    if (isset($_GET['instrid'])) {
        $instrid = $_GET['instrid'];
        $instrutor = Instrutor::getInstrutor($instrid);
        $nome = $instrutor->getNome();
        $certificacoes = $instrutor->getCertificacoes();
        $especializacoes = $instrutor->getEspecializacoes();
    } else {
        header("location: exibirInstrutores.php");
    }
} ?>
<h1 class="text-bg-dark p-1 m-2">Editar Instrutor</h1>
<div class="text-bg-dark p-3">
    <form action="editarInstrutor.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input value="<?= $nome ?>" type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group m-2">
            <p>Certificações:</p>
            <?php
            foreach ($certificacoes as $cert) {
            ?>
                <div id="row">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-danger" id="DeleteCertificacao" type="button">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                        <input value="<?= $cert ?>" type="text" class="form-control mb-1" id="certificacao" name="certificacao[]">
                    </div>
                </div>
            <?php } ?>
            <div id="newinputcertificacao"></div>
            <button id="rowAdderCertificacao" type="button" class=" btn btn btn-info mt-2">
                <i class="fas fa-plus-circle"></i>
            </button>


        </div>
        <div class="form-group m-2">
            <p>Especializações:</p>
            <?php
            foreach ($especializacoes as $esp) {
            ?>
                <div id="row">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button class="btn btn-danger" id="DeleteEspecializacao" type="button">
                                <i class="fas fa-trash-alt"></i>

                            </button>
                        </div>
                        <input value="<?= $esp ?>" type="text" class="form-control mb-1" id="especializacao" name="especializacao[]">
                    </div>
                </div>
            <?php } ?>
            <div id="newinputespecializacao"></div>
            <button id="rowAdderEspecializacao" type="button" class="btn btn btn-info mt-2">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
        <input type="hidden" name="instrid" value="<?= $instrid ?>">
        <button type="submit" name="submit" class="btn btn-primary mt-2">Salvar Alterações</button>
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