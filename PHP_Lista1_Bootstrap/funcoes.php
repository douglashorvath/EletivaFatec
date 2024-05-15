<?php

function defineSinal($numero)
{

    if ($numero > 0) {
        return "Valor Positivo";
    } else if ($numero < 0) {
        return "Valor Negativo";
    } else {
        return "Igual a Zero";
    }
}

function somaMultiplica($numero1, $numero2)
{
    $soma = $numero1 + $numero2;
    if ($numero1 == $numero2) {
        $triplo = $soma * 3;
        return "Valores iguais. O triplo da soma é igual a $triplo.";
    } else {
        return "A soma é igual a $soma";
    }
}

function exibeTabuada10($numero, $tag)
{
    for ($i = 0; $i <= 10; $i++) {
        $calc = $numero * $i;
        echo "<$tag>$numero X $i = $calc </$tag>";
    }
}

function calculaFatorial($numero)
{
    $fat = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $fat = $fat * $i;
    }
    return $fat;
}

function imprimeCrescente($numero01, $numero02)
{
    if ($numero01 > $numero02) {
        echo "<h5> $numero02 , $numero01 </h5>";
    } elseif ($numero01 < $numero02) {
        echo "<h5> $numero01 , $numero02 </h5>";
    } else {
        echo "<h5>Números iguais: $numero01 </h5>";
    }
}

function metrosParaCentimetros($metros)
{
    $centimetros = $metros * 100;
    return $centimetros;
}

function calculaLitros($metros)
{
    return  $metros / 3;
}

function calculaLatas($litros)
{
    return ceil($litros / 18);
}

function calculaPreco($latas)
{
    return number_format($latas * 80, 2);
}

function idadeAnos($ano)
{
    return date("Y") - $ano;
}

function idadeDias($ano)
{
    return idadeAnos($ano) * 365;
}

function idadeAnos2025($ano)
{
    return 2025 - $ano;
}

function calculaIMC($peso, $altura)
{
    return $peso / ($altura * $altura);
}
