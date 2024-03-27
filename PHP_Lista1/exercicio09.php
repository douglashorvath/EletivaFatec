<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 09</title>
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
        <h1>Exercício 09</h1>
        <h3>Faça um script PHP que receba de um formulário HTML5 uma variável com o ano de nascimento de
        uma pessoa, crie uma constante com o ano atual, calcule e mostre:
        <br>a. a idade dessa pessoa em anos;
        <br>b. quantos dias esta pessoa já viveu;
        <br>c. quantos anos essa pessoa terá em 2025</h3>

    </header>
    <main>
    <form action="exercicio09resposta.php" method="POST">
        <p><label>Informe o ano do seu nascimento:</label>
        <input type="text" name="ano"></p>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>