<?php

function conectarBanco()
{
    $conexao = new PDO("mysql:host=localhost;dbname=academiaphp", "root", "");
    return $conexao;
}

