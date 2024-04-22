<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 06</title>
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
    <h1>Exercício 06</h1>
    <h3>Faça um programa que receba o nome de 5 produtos e seus respectivos preços, calcule e mostre:  </h3>
    <ol type="a">
        <li>A quantidade de produtos com preço inferior a R$50,00. </li>
        <li>O nome dos produtos com preço entre R$50,00 e R$100,00.  </li>
        <li>A média dos preços dos produtos com preço superior a R$100,00.</li>
    </ol>
    </header>
    <main>
    <form action="exercicio06resposta.php" method="POST">
    <p> Informe os produtos:</p>
        <ol>
        <?php
            for($i=0; $i<5; $i++) {
            echo "<li><label>Nome: </label><input type='text' name='produtos[]'><label>  Preço: </label><input type'text' name='precos[]'></li>";}?>
        </ol>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>