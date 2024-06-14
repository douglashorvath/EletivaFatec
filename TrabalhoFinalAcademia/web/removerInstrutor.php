<?php
require_once("../classes/Instrutor.php");
require_once("../classes/Aula.php");
require_once("../classes/funcao.php");
if (isset($_GET['instrid'])) {
    $instrid = $_GET['instrid'];
    $instrutor = Instrutor::getInstrutor($instrid);
    if ($instrutor != null) {
        $aulas = Aula::getAulasPorInstrutor($instrid);
        if ($aulas == null || empty($aulas)) {
            if ($instrutor->excluirInstrutor()) {
                $msg = base64_encode("Instrutor Removido!");
                header("Location: exibirInstrutores.php?msg=" . $msg);
            } else {
                $msg = base64_encode("Erro ao remover instrutor!");
                header("Location: exibirInstrutores.php?error=" . $msg);
            }
        } else {
            $msg = base64_encode("Instrutor possui aulas cadastradas!");
            header("Location: exibirInstrutores.php?error=" . $msg);
        }
    }
} else {
    header("location: exibirInstrutores.php");
}
