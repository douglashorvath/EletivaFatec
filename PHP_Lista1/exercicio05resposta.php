<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 05</title>
    <style>
        header {
            color: blue;
        }

        main {
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <h1>Exercício 05</h1>
        <h3>Crie um algoritmo que solicite a entrada de um número, e exiba a tabuada de 0 a 10 de acordo com
            o número solicitado, ex:
            <br>Entrada = 4
            <br>Saída = 4 X 0 = 0...4 X 10 = 40.
        </h3>
    </header>
    <main>
        <?php
        if (isset($_POST['numero']) && $_POST['numero'] != "") {
            $numero = $_POST['numero'];
            echo "<h3>Entrada = $numero </h3>";
            $fat = 1;
            for ($i = 1; $i <= $numero; $i++) {
                $fat = $fat * $i;
            }
            echo "<h3>Fatorial: $fat</h3>";
        } else {
            echo "<h3>Número Inválido</h3>";
        }
        ?>

    </main>
</body>

</html>