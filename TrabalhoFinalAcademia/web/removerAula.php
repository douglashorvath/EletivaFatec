<?php
require_once("../classes/Aula.php");
require_once("../classes/Participacao.php");
require_once("../classes/funcao.php");

if (isset($_GET['aulaid'])) {
    $aulaId = $_GET['aulaid'];
    $aula = Aula::getAula($aulaId);
    if ($aula != null) {
        $presenca = Participacao::getParticipacoesAula($aula);
        if ($presenca == null || empty($presenca)) {
            if ($aula->excluirAula()) {
                $msg = base64_encode("Aula Removida!");
                header("Location: visualizarAulas.php?msg=" . $msg);
            } else {
                $msg = base64_encode("Erro ao remover aula!");
                header("Location: visualizarAulas.php?error=" . $msg);
            }
        } else {
            $msg = base64_encode("Não é possível remover aula com participações!");
            header("Location: visualizarAulas.php?error=" . $msg);
        }
    }
} else {
    header("location: visualizarAulas.php");
}
