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
    <h3>Escreva um programa para calcular a soma dos dois valores de entrada. Se os dois valores forem
iguais, retorne o triplo da soma</h3>
    </header>
    <main>
    <?php 
        if(isset($_POST['numero01']) && $_POST['numero01'] != '' && isset($_POST['numero02']) && $_POST['numero02'] != ''){
            $numero01 = $_POST['numero01'];
            $numero02 = $_POST['numero02'];
            $soma = $numero01 + $numero02;
            if($numero01 == $numero02)
            {
                $triplo = $soma*3;
                echo "<h3>Valores iguais. O triplo da soma é igual a $triplo.</h3>";
            }
            else{
                echo "<h3>A soma é igual a $soma.</h3>";
            }
            
        }else{
            echo "<h3>Número não informado.</h3>";
        }
    ?>

    </main>
</body>
</html>