<?php

function conectarBanco()
{
    $conexao = new PDO("mysql:host=localhost;dbname=bancophp", "root", "");
    return $conexao;
}

function retornarCategorias()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT * FROM categoria";
        $conexao = conectarBanco();
        $categorias = $conexao->query($sql);
        return $categorias;
    } catch (PDOException $ex) {
        return 0;
    }
}

function inserirProduto($nome, $descricao, $valor, $categoria)
{
    try {
        $conexao = conectarBanco();
        $sql = "INSERT INTO produto (nome, descricao, valor, categoria_id) VALUES (:nome, :descricao, :valor, :categoria)";
        $stmt =  $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":categoria", $categoria);
        return $stmt->execute();
    } catch (PDOException $ex) {
        return false;
    } finally {
        //$conexao = null;
    }
}

function retornarProdutos()
{
    try {
        $conexao = conectarBanco();
        $sql = "SELECT p.*, c.descricao as categoria FROM produto p INNER JOIN categoria c ON p.categoria_id = c.id";
        $conexao = conectarBanco();
        $produtos = $conexao->query($sql);
        return $produtos;
    } catch (PDOException $ex) {
        return 0;
    }
}
