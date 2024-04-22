<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 03</title>
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
    <h1>Exercício 03</h1>
    <h3>Digite 10 valores numéricos e armazene em um mapa ordenado. Em seguida, solicite ao usuário um número para multiplicar todos os elementos do vetor. 
        O programa deverá exibir o resultado da multiplicação do número dado pelo usuário em todos os elementos armazenados. </h3>
    </header>
    <main>
    <form action="exercicio03resposta.php" method="POST">
    <p> Informe os números:</p>
    <ol>
        <?php
            for($i=0; $i<10; $i++) {
            echo "<li><input type='number' name='numeros[]'> </li>";}?>
    </ol>
    <p> Informe o Multiplicador:</p>
    <input type="number" name="multiplicador">
    <p><button type="submit">Enviar</button></p>


    </form>
    </main>
</body>
</html>