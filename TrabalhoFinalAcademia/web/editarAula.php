<?php
require_once("cabecalho.php");
require_once("../classes/Aula.php");
if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'], $_POST['horario'], $_POST['instrutor'])) {
        $msg = base64_encode("Preencha todos os campos!");
        header("Location: editarAula.php?error=" . $msg);
    } else {
        $nome = $_POST['nome'];
        $horario = $_POST['horario'];
        $instrutorId = $_POST['instrutor'];

        if (empty($nome) || empty($horario) || empty($instrutorId)) {
            $msg = base64_encode("Preencha todos os campos!");
            header("Location: editarAula.php?error=" . $msg);
        } else {
            $aulaId = $_POST['aulaid'];

            $aula = Aula::getAula($aulaId);
            $instrutor = Instrutor::getInstrutor($instrutorId);

            $aula->setNome($nome);
            $aula->setHorario($horario);
            $aula->setInstrutor($instrutor);

            if ($aula->salvarAlteracoes()) {
                $msg = base64_encode("Alterações Salvas!");
                header("Location: visualizarAulas.php?msg=" . $msg . "&aula_id=" . $aula->getId());
            } else {
                $msg = base64_encode("Erro ao salvar alterações!");
                header("Location: visualizarAulas.php?error=" . $msg);
            }
        }
    }
} else {
    if (isset($_GET['aulaid'])) {
        $aulaId = $_GET['aulaid'];
        $aula = Aula::getAula($aulaId);
        $nome = $aula->getNome();
        $horario = $aula->getHorario();
        $instrutor = $aula->getInstrutor();
        $instrutorId = $instrutor->getId();
    } else {
        header("location: visualizarAulas.php");
    }
}
?>
<h1 class="text-bg-dark p-1 m-2">Editar Aula</h1>
<div class="text-bg-dark p-3">
    <form action="editarAula.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input value="<?= $nome ?>" type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <div class="form-group col-md-2 m-2">
                <label for="horario">Horário:</label>
                <input value="<?= $horario ?>" type="time" class="form-control" id="horario" name="horario" required>
            </div>
            <div class="form-group m-2">
                <label for="instrutor">Instrutor:</label>
                <select class="form-control" id="instrutor" name="instrutor" required>
                    <?php
                    $instrutores = Instrutor::getTodosInstrutores();
                    foreach ($instrutores as $instr) {
                        if ($instr->getId() == $instrutorId)
                            echo "<option selected value='" . $instr->getId() . "'>" . $instr->getNome() . "</option>";
                        else
                            echo "<option value='" . $instr->getId() . "'>" . $instr->getNome() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <input type="hidden" name="aulaid" value="<?= $aulaId ?>">
        <button type="submit" name="submit" class="btn btn-primary mt-2">Salvar Alterações</button>
    </form>
    <?php
    require_once("rodape.php");
    ?>