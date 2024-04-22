<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01</title>
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
    <h1>Exercício 01</h1>
    <h3>Entre com os dados de 10 alunos de uma classe, recebendo as informações como nome e uma nota do aluno. Armazene estes dados em um mapa ordenado. 
        Ao final do programa mostrar a média de nota da classe, e o nome do aluno que obteve maior nota. </h3>
    </header>
    <main>
    
    <form action="exercicio01resposta.php" method="POST">
        <p> Informe os nomes e as notas dos alunos</p>
        <?php
            for($i=0; $i<10; $i++) {
            echo "<p><label> Informe o Nome: </label> <input type='text' name='nomes[]'>";
            echo "<label> Informe a Nota: </label> <input type='number' min=0 max=10 name='notas[]'</p>"; }?>
        <p><button type="submit">Enviar</button></p>

    </form>
    </main>
</body>
</html>