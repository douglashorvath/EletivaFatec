<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 07</title>
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
    <h1>Exercício 07</h1>
    <h3>Crie um programa em PHP que receba os seguintes dados de 10 alunos: nome, nota1 e nota2. 
        Armazene esses dados em um mapa ordenado que contenha também o armazenamento da média de nota do aluno.
        Seu programa deve imprimir a lista dos aprovados com as médias finais e outra lista dos reprovados sem exibir o valor da média.</h3>
    
    </header>
    <main>
    <form action="exercicio07resposta.php" method="POST">
    <p> Informe os dados:</p>
        <ol>
        <?php
            for($i=0; $i<10; $i++) {
            echo "<li><label>Nome: </label><input type='text' name='nomes[]'><label>  Nota 1: </label><input type'number' min=0 max=10 name='notas1[]'><label> Nota 2: </label><input type'number' min=0 max=10 name='notas2[]'></li>";}?>
        </ol>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>