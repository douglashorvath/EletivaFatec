<?php
require_once("../classes/Participacao.php");
require_once("../classes/funcao.php");

if (isset($_GET['participacaoid'])) {
    $participacaoId = $_GET['participacaoid'];
    $participacao = Participacao::getParticipacao($participacaoId);
    if ($participacao != null) {
        if ($participacao->excluirParticipacao()) {
            $msg = base64_encode("Participação Removida!");
            header("Location: visualizarParticipacao.php?msg=" . $msg);
        } else {
            $msg = base64_encode("Erro ao remover participação!");
            header("Location: visualizarParticipacao.php?error=" . $msg);
        }
    }
} else {
    header("location: visualizarParticipacao.php");
}
