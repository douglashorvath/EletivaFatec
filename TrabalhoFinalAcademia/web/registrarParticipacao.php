<?php
require_once("cabecalho.php");
require_once("../classes/Participacao.php");

if (isset($_POST['submit'])) {
    if (!isset($_POST['aulaid'], $_POST['membroid'], $_POST['horario'])) {
        $msg = base64_encode("Preencha todos os campos!");
        header("Location: registrarParticipacao.php?error=" . $msg);
    } else {
        $membro_id = $_POST['membroid'];
        $aula_id = $_POST['aulaid'];
        $horario = $_POST['horario'];
        echo $horario;


        $membro = Membro::getMembro($membro_id);
        $aula = Aula::getAula($aula_id);

        if ($membro && $aula) {
            $participacao = new Participacao();
            $participacao->setMembro($membro);
            $participacao->setAula($aula);
            $participacao->setData_hora($horario);

            if ($participacao->inserirParticipacao()) {
                $msg = base64_encode("Participação Adicionada!");
                header("Location: visualizarParticipacao.php?msg=" . $msg);
            } else {
                $msg = base64_encode("Erro ao inserir participação!");
                header("Location: visualizarParticipacao.php?error=" . $msg);
            }
        } else {
            $msg = base64_encode("Membro ou Aula não encontrados!");
            header("Location: registrarParticipacao.php?error=" . $msg);
        }
    }
}
?>
<h1 class="text-bg-dark p-1 m-2">Adicionar Participação</h1>
<div class="text-bg-dark p-3">
    <form action="registrarParticipacao.php" method="POST">
        <div class="form-group m-2">
            <label for="membro">Membro:</label>
            <select class="form-control" id="membro" name="membroid" required>
                <option value="">Selecione...</option>
                <?php
                require_once("../classes/Membro.php");
                $membros = Membro::getTodosMembros();

                foreach ($membros as $membro) {
                    echo "<option value='" . $membro->getId() . "'>" . $membro->getNome() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group m-2">
            <label for="aula">Aula:</label>
            <select class="form-control" id="aula" name="aulaid" required>
                <option value="">Selecione...</option>
                <?php
                require_once("../classes/Aula.php");
                $aulas = Aula::getTodasAulas();
                foreach ($aulas as $aula) {
                    echo "<option value='" . $aula->getId() . "'>" . $aula->getNome() . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-2 m-2">
            <label for="horario">Data/Hora:</label>
            <input type="datetime-local" class="form-control" name="horario" value="<?= date('Y-m-d\TH:i') ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-2">Adicionar Participação</button>
    </form>
</div>

<?php require_once("rodape.php"); ?>