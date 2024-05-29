<?php
require_once("../cabecalho.php");
?>

<h1 class="text-bg-dark p-1 m-2">Membros</h1>
<div class="row mb-3">
    <form action="exibirMembros.php" method="POST" class="form-inline">
        <div class="input-group w-100">
            <input type="text" name="search" class="form-control" placeholder="Buscar membros...">
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
            <th>Idade</th>
            <th>Tipo de Plano</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require "Membro.php";

        if (isset($_POST['search'])) {
            $nome = $_POST['search'];
            $membros = Membro::getMembros($nome);
        } else {
            if (isset($_GET['memberid'])) {
                $memberid = $_GET['memberid'];
                $membro = Membro::getMembro($memberid);
                $membros = array();
                array_push($membros, $membro);
            } else {
                $membros = Membro::getTodosMembros();
            }
        }

        if (count($membros) > 0) {

            foreach ($membros as $membro) {

        ?>
                <tr>
                    <td><?= $membro->getId() ?></td>
                    <td><?= $membro->getNome() ?></td>
                    <td><?= $membro->getIdade() ?></td>
                    <td><?= $membro->getTipo_plano() ?></td>
                    <td>
                        <a href="editar.php?id=<?= $membro->getId() ?>" class="btn btn-warning btn-sm" title="Alterar"><i class="fas fa-edit"></i></a>
                        <a href="excluir.php?id=<?= $membro->getId() ?>" class="btn btn-danger btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                        <a href="exibirParticipacoes.php?id_membro=<?= $membro->getId() ?>" class="btn btn-info btn-sm" title="Ver Participações"><i class="fas fa-calendar-alt"></i></a>
                    </td>
                </tr>

        <?php
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum membro encontrado</td></tr>";
        }
        ?>

    </tbody>
</table>

<?php
require_once("../rodape.php");
?>