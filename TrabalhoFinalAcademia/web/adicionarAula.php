<?php
require("cabecalho.php");
require_once("../classes/Instrutor.php");
require_once("../classes/Aula.php");
if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'], $_POST['horario'], $_POST['instrutor'])) {
        $msg = base64_encode("Preencha todos os campos1!");
        header("Location: adicionarAula.php?error=" . $msg);
    } else {
        $nome = $_POST['nome'];
        $horario = $_POST['horario'];
        $instrutor_id = $_POST['instrutor'];
        if (empty($nome) || empty($horario) || empty($instrutor_id)) {
            $msg = base64_encode("Preencha todos os campos2!");
            header("Location: adicionarAula.php?error=" . $msg);
        } else {
            $instrutor = Instrutor::getInstrutor($instrutor_id);
            if ($instrutor != null) {
                $aula = new Aula();
                $aula->setNome($nome);
                $aula->setHorario($horario);
                $aula->setInstrutor($instrutor);
                if ($aula->inserirAula()) {
                    $msg = base64_encode("Aula adicionada com sucesso!");
                    header("Location: visualizarAulas.php?msg=" . $msg);
                } else {
                    $msg = base64_encode("Erro ao adicionar aula!");
                    header("Location: adicionarAula.php?error=" . $msg);
                }
            } else {
                $msg = base64_encode("Instrutor não encontrado!");
                header("Location: adicionarAula.php?error=" . $msg);
            }
        }
    }
} else {
    $instrutores = Instrutor::getTodosInstrutores();
}
?>
<h1 class="text-bg-dark p-1 m-2">Adicionar Aula</h1>
<div class="text-bg-dark p-3">
    <form action="adicionarAula.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <div class="form-group col-md-2 m-2">
                <label for="horario">Horário:</label>
                <input type="time" class="form-control" id="horario" name="horario" required>
            </div>
            <div class="form-group m-2">
                <label for="instutor">Instrutor:</label>
                <select class="form-control" id="instrutor" name="instrutor" required>
                    <option value="">Selecione...</option>
                    <?php
                    foreach ($instrutores as $instr) {
                        echo "<option value='" . $instr->getId() . "'>" . $instr->getNome() . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-2">Adicionar Aula</button>
        <?php
        require_once("rodape.php");
        ?>