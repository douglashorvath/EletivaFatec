<?php
require_once("cabecalho.php");
require_once("../classes/Participacao.php");

if (isset($_POST['submit'])) {
    if (!isset($_POST['horario'], $_POST['membro'], $_POST['aula'])) {
        $msg = base64_encode("Preencha todos os campos!");
        header("Location: editarParticipacao.php?error=" . $msg);
    } else {
        $data_hora = $_POST['horario'];
        $membroId = $_POST['membro'];
        $aulaId = $_POST['aula'];

        if (empty($data_hora) || empty($membroId) || empty($aulaId)) {
            $msg = base64_encode("Preencha todos os campos!");
            header("Location: editarParticipacao.php?error=" . $msg);
        } else {
            $participacaoId = $_POST['participacaoid'];

            $participacao = Participacao::getParticipacao($participacaoId);
            $membro = Membro::getMembro($membroId);
            $aula = Aula::getAula($aulaId);

            $participacao->setData_hora($data_hora);
            $participacao->setMembro($membro);
            $participacao->setAula($aula);

            if ($participacao->salvarAlteracoes()) {
                $msg = base64_encode("Alterações Salvas!");
                header("Location: visualizarParticipacao.php?msg=" . $msg . "&participacaoid=" . $participacao->getId());
            } else {
                $msg = base64_encode("Erro ao salvar alterações!");
                header("Location: visualizarParticipacao.php?error=" . $msg);
            }
        }
    }
} else {
    if (isset($_GET['participacaoid'])) {
        $participacaoId = $_GET['participacaoid'];
        $participacao = Participacao::getParticipacao($participacaoId);
        $data_hora = $participacao->getData_hora();
        $membro = $participacao->getMembro();
        $membroId = $membro->getId();
        $aula = $participacao->getAula();
        $aulaId = $aula->getId();
    } else {
        header("location: visualizarParticipacao.php");
    }
}
?>
<h1 class="text-bg-dark p-1 m-2">Editar Participação</h1>
<div class="text-bg-dark p-3">
    <form action="editarParticipacao.php" method="POST">
        <div class="form-group m-2">
            <label for="membro">Membro:</label>
            <select class="form-control" id="membro" name="membro" required>
                <?php
                $membros = Membro::getTodosMembros();
                foreach ($membros as $membro) {
                    if ($membro->getId() == $membroId)
                        echo "<option selected value='" . $membro->getId() . "'>" . $membro->getNome() . "</option>";
                    else
                        echo "<option value='" . $membro->getId() . "'>" . $membro->getNome() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group m-2">
            <label for="aula">Aula:</label>
            <select class="form-control" id="aula" name="aula" required>
                <?php
                $aulas = Aula::getTodasAulas();
                foreach ($aulas as $aula) {
                    if ($aula->getId() == $aulaId)
                        echo "<option selected value='" . $aula->getId() . "'>" . $aula->getNome() . "</option>";
                    else
                        echo "<option value='" . $aula->getId() . "'>" . $aula->getNome() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-2 m-2">
            <label for="horario">Data/Hora:</label>
            <input value="<?= $data_hora ?>" type="datetime-local" class="form-control" name="horario" id="horario" required>
        </div>
        <input type="hidden" name="participacaoid" value="<?= $participacaoId ?>">
        <button type="submit" name="submit" class="btn btn-primary mt-2">Salvar Alterações</button>
    </form>
    <?php
    require_once("rodape.php");
    ?>