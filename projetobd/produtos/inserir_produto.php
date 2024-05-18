<?php
    require_once("../cabecalho.php");
?>

    <h3>Inserir Produto</h3>
    <form action="inserir_produto.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control"     name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="descricao" class="form-label">Informe a descrição</label>
                <input type="text" class="form-control"     name="descricao">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="valor" class="form-label">Informe o valor</label>
                <input type="text" class="form-control"     name="valor">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione a categoria</label>
                <select class="form-select" name="categoria">
                    <?php
                        $categorias = retornarCategorias();
                        foreach($categorias as $categoria=>$c){
                            echo "<option value='".$c["id"]."'>".$c["descricao"]."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    if($_POST)
    {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        if($nome != "" && $descricao != "" && $valor != "" && $categoria != "")
        {
            if(inserirProduto($nome, $descricao, $valor, $categoria))
            {
                echo "Produto inserido com sucesso!";
            }
            else{
                echo "Não foi possível inserir o produto!";
            }
        }
        else
        {
            echo "Preencha todos os campos!";
        }
    }
            
    require_once("../rodape.php");