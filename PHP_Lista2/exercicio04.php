<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 04</title>
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
    <h1>Exercício 04</h1>
    <h3>4.	Crie um vetor que armazene o nome de todos os meses do ano. Peça ao usuário que digite um número e ele informe qual o nome do mês correspondente. </h3>
    </header>
    <main>
    <form action="exercicio04resposta.php" method="POST">
    <p> Informe o numero do mês:</p>
    <input type="number" min=1 max=12 name="mes">
    <p><button type="submit">Enviar</button></p>


    </form>
    </main>
</body>
</html>