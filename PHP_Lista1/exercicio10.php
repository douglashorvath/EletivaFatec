<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
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
        <h1>Exercício 10</h1>
        <h3>Crie uma página em HTML5 na qual a pessoa possa digitar seu peso e sua altura e um programa PHP
para o cálculo do IMC da pessoa. Defina se a pessoa está acima ou abaixo do peso. Procure referências
sobre este índice (o que é considerado normal, abaixo ou acima do peso). Inclua a referência (página
de acesso) para que a pessoa leia sobre este assunto.</h3>

    </header>
    <main>
    <form action="exercicio10resposta.php" method="POST">
        <p><label>Peso (em kg):</label>
        <input type="text" name="peso"></p>
        <p><label>Altura (em m):</label>
        <input type="text" name="altura"></p>
        <p><button type="submit">Enviar</button></p>

        

    </form>
    </main>
</body>
</html>