<?php
require_once("../classes/Instrutor.php");
require_once("../classes/funcao.php");
if (isset($_GET['instrid'])) {
    $instrid = $_GET['instrid'];
    $instrutor = Instrutor::getInstrutor($instrid);
    if ($instrutor != null) {
        if ($instrutor->excluirInstrutor()) {
            $msg = base64_encode("Instrutor Removido!");
            header("Location: exibirInstrutores.php?msg=" . $msg);
        } else {
            $msg = base64_encode("Erro ao remover instrutor!");
            header("Location: exibirInstrutores.php?error=" . $msg);
        }
    }
} else {
    header("location: exibirInstrutores.php");
}
