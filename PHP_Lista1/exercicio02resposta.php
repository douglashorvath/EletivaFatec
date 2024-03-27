<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 02</title>
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
    <h1>Exercício 02</h1>
    <h3>Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima a posição do
menor valor na sequência de entrada</h3>
    </header>
    <main>
    <?php 
    //conferindo isset e atribuindo em vetor
    $numeros = array();
    $numeros[1] = isset($_POST['numero01']) ? $_POST['numero01'] : "";
    $numeros[2] = isset($_POST['numero02']) ? $_POST['numero02'] : "";
    $numeros[3] = isset($_POST['numero03']) ? $_POST['numero03'] : "";
    $numeros[4] = isset($_POST['numero04']) ? $_POST['numero04'] : "";
    $numeros[5] = isset($_POST['numero05']) ? $_POST['numero05'] : "";
    $numeros[6] = isset($_POST['numero06']) ? $_POST['numero06'] : "";
    $numeros[7] = isset($_POST['numero07']) ? $_POST['numero07'] : "";
    
    //menor valor
    $menorValor = min($numeros);
    //posicao
    $posicaoMenorValor = array_search($menorValor, $numeros);

    echo "<h3>O menor valor é $menorValor na posição $posicaoMenorValor</h3>";
    
    
    ?>

    </main>
</body>
</html>