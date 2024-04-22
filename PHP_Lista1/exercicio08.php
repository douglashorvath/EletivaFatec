<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 08</title>
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
        <h1>Exercício 08</h1>
        <h3>Faça um programa em PHO para uma loja de tintas. O programa deverá pedir o tamanho em metros
quadrados da área a ser pintada. Considere que a cobertura da tinta é de 1 litro para cada 3 metros
quadrados e que a tinta é vendida em latas de 18 litros, que custam R$ 80,00. Informe ao usuário a
quantidades de latas de tinta a serem compradas e o preço total
    </header>
    <main>
    <form action="exercicio08resposta.php" method="POST">
        <p><label>Informe o tamanho, em mestros quadrados, da área a ser pintada:</label>
        <input type="text" name="metros"></p>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>