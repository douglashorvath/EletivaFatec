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
        <h3>Faça um algoritmo PHP que receba os valores A e B, imprima-os em ordem crescente em relação aos
seus valores. Caso os valores sejam iguais, informar o usuário e imprimir o valor em tela apenas uma
vez.
        <br>Exemplo, para A=5, B=4 você deve imprimir na tela: "4 5".
        <br>para A=5, B=5 você deve imprimir na tela: “Números iguais: 5”</h3>
    </header>
    <main>
    <form action="exercicio06resposta.php" method="POST">
        <p><label>Informe o valor 01</label>
        <input type="text" name="numero01"></p>
        <p><label>Informe o valor 02</label>
        <input type="text" name="numero02"></p>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>