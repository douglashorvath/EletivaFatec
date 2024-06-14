<?php

function conectarBanco()
{
    $conexao = new PDO("mysql:host=localhost;dbname=academiaphp", "root", "");
    return $conexao;
}

function arrayToList($array)
{
    if (count($array) > 1) {
        $string  = implode(', ', array_slice($array, 0, -1));
        $string .= ' e ' . $array[count($array) - 1];

        return $string;
    } else {
        if (count($array) > 0) {
            return $array[0];
        }
        return "";
    }
}
