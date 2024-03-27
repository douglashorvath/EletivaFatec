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
        <h3>Crie um algoritmo que solicite a entrada de um número, e exiba a tabuada de 0 a 10 de acordo com
    o número solicitado, ex:
        <br>Entrada = 4
        <br>Saída = 4 X 0 = 0...4 X 10 = 40.</h3>
    </header>
    <main>
    <?php 
        if(isset($_POST['numero01']) && $_POST['numero01'] != '' && isset($_POST['numero02']) && $_POST['numero02'] != '')
        {
            $numero01 = $_POST['numero01'];
            $numero02 = $_POST['numero02'];
            if($numero01 > $numero02)
            {
                echo "<h3> $numero02 , $numero01 </h3>";
            }elseif($numero01 < $numero02){
                echo "<h3> $numero01 , $numero02 </h3>";
            }else{
                echo "<h3>Números iguais: $numero01 </h3>";
            }
        }
        else{
            echo "<h3>Número Inválido</h3>";
        }
    ?>

    </main>
</body>
</html>