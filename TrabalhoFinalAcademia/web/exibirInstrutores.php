<?php
require_once("cabecalho.php");
?>

<h1 class="text-bg-dark p-1 m-2">Instrutores</h1>
<div class="row mb-3">
    <form action="exibirInstrutores.php" method="POST" class="form-inline">
        <div class="input-group w-100">
            <input type="text" name="search" class="form-control" placeholder="Buscar instrutores...">
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
            <th>Certificações</th>
            <th>Especializações</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require "../classes/Instrutor.php";

        if (isset($_POST['search'])) {
            $nome = $_POST['search'];
            $instrutores = Instrutor::getInstrutores($nome);
        } else {
            if (isset($_GET['instrid'])) {
                $instrid = $_GET['instrid'];
                $instrutor = Instrutor::getInstrutor($instrid);
                $instrutores = array();
                array_push($instrutores, $instrutor);
            } else {
                $instrutores = Instrutor::getTodosInstrutores();
            }
        }

        if (count($instrutores) > 0) {

            foreach ($instrutores as $instrutor) {

        ?>
                <tr>
                    <td><?= $instrutor->getId() ?></td>
                    <td><?= $instrutor->getNome() ?></td>
                    <td><?= arrayToList($instrutor->getCertificacoes()) ?></td>
                    <td><?= arrayToList($instrutor->getEspecializacoes()) ?></td>
                    <td>
                        <a href="editarInstrutor.php?instrid=<?= $instrutor->getId() ?>" class="btn btn-warning btn-sm" title="Alterar"><i class="fas fa-edit"></i></a>
                        <a href="removerInstrutor.php?instrid=<?= $instrutor->getId() ?>" class="btn btn-danger btn-sm" title="Excluir"><i class="fas fa-trash-alt"></i></a>
                        <a href="visualizarAulas.php?instrid=<?= $instrutor->getId() ?>" class="btn btn-info btn-sm" title="Ver Aulas"><i class="fas fa-book-open"></i></a>
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
require_once("rodape.php");
?>