<?php
require_once("cabecalho.php");
?>

<h1 class="text-bg-dark p-1 m-2">Aulas</h1>
<div class="row mb-3">
    <form action="visualizarAulas.php" method="POST" class="form-inline">
        <div class="input-group w-100">
            <input type="text" name="search" class="form-control" placeholder="Buscar aulas...">
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
            <th>Nome</th>
            <th>Horário</th>
            <th>Instrutor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once("../classes/Aula.php");

        if (isset($_POST['search'])) {
            $nome = $_POST['search'];
            $aulas = Aula::getAulas($nome);
        } else {
            if (isset($_GET['aulaid'])) {
                $aulaid = $_GET['aulaid'];
                $aula = Membro::getMembro($aulaid);
                $aulas = array();
                array_push($aulas, $aula);
            } else {
                if (isset($_GET['instrid'])) {
                    $instrutorid = $_GET['instrid'];
                    $aulas = Aula::getAulasPorInstrutor($instrutorid);
                } else {
                    $aulas = Aula::getTodasAulas();
                }
            }
        }

        if (count($aulas) > 0) {

            foreach ($aulas as $aula) {

                $horaaula = date("H:i", strtotime($aula->getHorario()));

        ?>
                <tr>
                    <td><?= $aula->getId() ?></td>
                    <td><?= $aula->getNome() ?></td>
                    <td><?= $horaaula ?></td>
                    <td><?= $aula->getInstrutor()->getNome() ?></td>
                    <td>
                        <a href="editarAula.php?aulaid=<?= $aula->getId() ?>" class="btn btn-warning btn-sm" title="Alterar"><i class="fas fa-edit"></i></a>
                        <a href="removerAula.php?aulaid=<?= $aula->getId() ?>" class="btn btn-danger btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                        <a href="visualizarParticipacao.php?aulaid=<?= $aula->getId() ?>" class="btn btn-info btn-sm" title="Ver Participações"><i class="fas fa-calendar-alt"></i></a>
                    </td>
                </tr>

        <?php
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma aula encontrada</td></tr>";
        }
        ?>

    </tbody>
</table>

<?php
require_once("rodape.php");
?>