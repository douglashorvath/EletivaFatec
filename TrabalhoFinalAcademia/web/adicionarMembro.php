<?php
require_once("cabecalho.php");
require_once("../classes/Membro.php");
if (isset($_POST['submit'])) {
    if (!isset($_POST['nome'], $_POST['idade'], $_POST['tipo_plano'])) {
        $msg = base64_encode("Preencha todos os campos!");
        header("Location: adicionarMembro.php?error=" . $msg);
    } else {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $tipo_plano = $_POST['tipo_plano'];
        if (empty($nome) || empty($idade) || empty($tipo_plano)) {
            $msg = base64_encode("Preencha todos os campos!");
            header("Location: adicionarMembro.php?error=" . $msg);
        }
        $membro = new Membro();
        $membro->setNome($nome);
        $membro->setIdade($idade);
        $membro->setTipo_plano($tipo_plano);
        if ($membro->inseriorMembro()) {
            header("Location: exibirMembros.php?memberid=" . $membro->getId());
        } else {
            $msg = base64_encode("Erro ao inserir membro!");
            header("Location: exibirMembros.php?error=" . $msg);
        }
    }
}



?>
<h1 class="text-bg-dark p-1 m-2">Adicionar Membro</h1>
<div class="text-bg-dark p-3">
    <form action="adicionarMembro.php" method="POST">
        <div class="form-group m-2">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group m-2">
            <label for="idade">Idade:</label>
            <input type="number" class="form-control" id="idade" name="idade" required>
        </div>
        <div class="form-group m-2">
            <label for="tipo_plano">Tipo de Plano:</label>
            <select class="form-control" id="tipo_plano" name="tipo_plano" required>
                <option value="">Selecione...</option>
                <option value="Básico">Básico</option>
                <option value="Especial">Especial</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-2">Adicionar Membro</button>
    </form>
    <?php
    require_once("rodape.php");
    ?>