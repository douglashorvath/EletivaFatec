<?php

   // $nome = $_POST['nome'];
   // echo "Seja bem vindo $nome";

   $valor1 = $_POST['valor1'];
   $valor2 = $_POST['valor2'];

   $soma = $valor1 + $valor2;
   $sub = $valor1 - $valor2;
   $mult = $valor1 * $valor2;
   $div = $valor1 / $valor2;

   echo "<p> Soma: $soma </p>";
   echo "<p> Subtração: $sub </p>";
   echo "<p> Multiplicação: $mult </p>";
   echo "<p> Divisão: $div </p>";

   if($soma > 0){
        echo "<p>A soma é maior que zero</p>";
   } elseif($soma < 0)
   {
        echo "<p>A soma é menor que zero</p>";
   } else{
        echo "<p>A soma é igual a zero</p>";
   }

   switch ($soma)
   {
        case 0: echo "<p>A soma é igual a zero</p>"; break;
        case 1: echo "<p>A soma é igual a um</p>"; break;
        default: echo "<p>A soma não é zero nem um</p>"; break;
   }

   echo $sub == 0 ? "<p>Igual a zero</p>" : "<p> Diferente de zero</p>";

   if($soma == 0 && $sub == 0 || !($mult==0))
   {

   }