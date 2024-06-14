<?php
require_once("cabecalho.php");
require_once("../classes/Participacao.php");

?>

<h1 class="text-bg-dark p-1 m-2">Participações</h1>
<div class="row mb-3">
    <form action="visualizarParticipacao.php" method="POST" class="form-inline">
        <div class="input-group w-100">
            <input type="text" name="search" class="form-control" placeholder="Buscar participações...">
            <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<table class="table table-bordered table-striped table-dark table-hover">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Membro</th>
            <th>Aula</th>
            <th>Data e Hora</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $participacoes = Participacao::getParticipacoes($search);
        } else {
            if (isset($_GET['memberid'])) {
                $memberid = $_GET['memberid'];
                $membro = Membro::getMembro($memberid);
                $participacoes = Participacao::getParticipacoesMembro($membro);
            } else {
                if (isset($_GET['aulaid'])) {
                    $aulaid = $_GET['aulaid'];
                    $aula = Aula::getAula($aulaid);
                    $participacoes = Participacao::getParticipacoesAula($aula);
                } else {
                    if (isset($_GET['participacaoid'])) {
                        $participacaoid = $_GET['participacaoid'];
                        $participacao = Participacao::getParticipacao($participacaoid);
                        $participacoes = array();
                        array_push($participacoes, $participacao);
                    } else {
                        $participacoes = Participacao::getTodasParticipacoes();
                    }
                }
            }
        }


        if ($participacoes) {
            foreach ($participacoes as $participacao) {
                $membro = $participacao->getMembro();
                $aula = $participacao->getAula();
                $horaaula = date('d/m/Y  H:i', strtotime($participacao->getData_hora()));
        ?>
                <tr>
                    <td><?= $participacao->getId() ?></td>
                    <td><?= $membro->getNome() ?></td>
                    <td><?= $aula->getNome() ?></td>
                    <td><?= $horaaula ?></td>
                    <td>
                        <a href="editarParticipacao.php?participacaoid=<?= $participacao->getId() ?>" class="btn btn-warning btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                        <a href="removerParticipacao.php?participacaoid=<?= $participacao->getId() ?>" class="btn btn-danger btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma participação encontrada</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
require_once("rodape.php");
?>