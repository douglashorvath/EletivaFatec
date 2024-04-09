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
    <?php 
        if(isset($_POST["numeros"]))
        {
            $numeros = $_POST["numeros"];
            $multiplicador = $_POST["multiplicador"];
            foreach($numeros as $n)
            {
                $mult = $n * $multiplicador;
                echo "<h3> $n * $multiplicador = $mult </h3>";
            }
        }
    
    ?>

    </main>
</body>
</html>