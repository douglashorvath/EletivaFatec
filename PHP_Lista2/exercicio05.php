<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 05</title>
    <style>
        header{
            color: blue;
        }
        main{
            color: black;
        }
    </style>
</head>
<body>
    <header>
    <h1>Exercício 05</h1>
    <h3>Faça um programa que leia 20 números inteiros. Crie, a seguir, um vetor resultante que contenha todos os números primos do vetor digitado. Mostre os valores do vetor resultante.</h3>
    </header>
    <main>
    <form action="exercicio05resposta.php" method="POST">
    <p> Informe os números:</p>
    <ol>
        <?php
            for($i=0; $i<20; $i++) {
            echo "<li><input type='number' name='numeros[]'> </li>";}?>
    </ol>
    <p><button type="submit">Enviar</button></p>


    </form>
    </main>
</body>
</html>