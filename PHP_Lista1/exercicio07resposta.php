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
        <h3>Faça um programa em PHP no qual leia um valor em metros e o converta em centímetros
    </header>
    <main>
    <?php 
        if(isset($_POST['numero']) && $_POST['numero'] != "")
        {
            $numero = $_POST['numero'];
            $centimetros = $numero * 100;
            echo "<h3>$numero metros são $centimetros centrimetros. </h3>";
        }
        else{
            echo "<h3>Número Inválido</h3>";
        }
    ?>

    </main>
</body>
</html>