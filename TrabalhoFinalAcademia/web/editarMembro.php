<?php
require_once("cabecalho.php");
require_once("../classes/Membro.php");

if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'], $_POST['idade'], $_POST['tipo_plano'])) {
        echo "Preencha todos os campos!";
    } else {
        $memberid = $_POST['memberid'];
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $tipo_plano = $_POST['tipo_plano'];
        if (empty($nome) || empty($idade) || empty($tipo_plano)) {
            echo "Preencha todos os campos!";
        }
        $membro = new Membro();
        $membro->setId($memberid);
        $membro->setNome($nome);
        $membro->setIdade($idade);
        $membro->setTipo_plano($tipo_plano);
        if ($membro->salvarAlteracoes()) {
            $msg = base64_encode("Alterações Salvas!");
            header("Location: exibirMembros.php?msg=" . $msg . "&memberid=" . $membro->getId());
        } else {
            $msg = base64_encode("Erro ao salvar alterações!");
            header("Location: exibirMembros.php?error=" . $msg);
        }
    }
} else {
    if (isset($_GET["memberid"])) {
        $memberid = $_GET["memberid"];
        $membro = Membro::getMembro($memberid);
        $nome = $membro->getNome();
        $idade = $membro->getIdade();
        $tipo_plano = $membro->getTipo_plano();
    } else {
        header("location: exibirMembros.php");
    }
}

?>

<h1 class="text-bg-dark p-1 m-2">Editar Membro</h1>
<div class="text-bg-dark p-3">
    <form action="editarMembro.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input value="<?= $nome ?>" type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group m-2">
            <label for="idade">Idade:</label>
            <input value="<?= $idade ?>" type="number" class="form-control" id="idade" name="idade" required>
        </div>
        <div class="form-group m-2">
            <label for="tipo_plano">Tipo de Plano:</label>
            <select class="form-control" id="tipo_plano" name="tipo_plano" required>
                <?php
                if ($tipo_plano == "Básico") {
                    echo "<option value='Básico' selected>Básico</option>";
                    echo "<option value='Especial'>Especial</option>";
                } else {
                    echo "<option value='Básico'>Básico</option>";
                    echo "<option value='Especial' selected>Especial</option>";
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="memberid" value="<?= $memberid ?>">
        <button type="submit" name="submit" class="btn btn-primary mt-2">Salvar Alterações</button>
    </form>

    <?php
    require_once("rodape.php");
    ?>