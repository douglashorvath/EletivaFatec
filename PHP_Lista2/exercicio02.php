<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 02</title>
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
    <h1>Exercício 02</h1>
    <h3>Entre com 10 números e armazene em um vetor. Ao final o programa deverá mostrar:  </h3>
    <ol type="a">
        <li>Quantos negativos foram digitados;</li>
        <li>Quantos positivos foram digitados; </li>
        <li>Quantos pares e ímpares.</li>
    </ol>
    </header>
    <main>
    <form action="exercicio02resposta.php" method="POST">
    <p> Informe os números:</p>
        <ol>
        <?php
            for($i=0; $i<10; $i++) {
            echo "<li><input type='number' name='numeros[]'> </li>";}?>
        </ol>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>