<?php
require_once("../classes/Membro.php");
require_once("../classes/funcao.php");
if (isset($_GET['memberid'])) {
    $memberid = $_GET['memberid'];
    $membro = Membro::getMembro($memberid);
    if ($membro != null) {
        if ($membro->excluirMembro()) {
            $msg = base64_encode("Membro Removido!");
            header("Location: exibirMembros.php?msg=" . $msg);
        } else {
            $msg = base64_encode("Erro ao remover membro!");
            header("Location: exibirMembros.php?error=" . $msg);
        }
    } else {
        $msg = base64_encode("Membro não existente!");
        header("Location: exibirMembros.php?error=" . $msg);
    }
} else {
    header("location: exibirMembros.php");
}
