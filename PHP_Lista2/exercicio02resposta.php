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
    <h3>Entre com 10 números e armazene em um vetor. Ao final o programa deverá mostrar:  </h3>
    <ol type="a">
        <li>Quantos negativos foram digitados;</li>
        <li>Quantos positivos foram digitados; </li>
        <li>Quantos pares e ímpares.</li>
    </ol>
    </header>
    <main>
    <?php 
    
    if(isset($_POST['numeros'])) {
        $numeros = $_POST['numeros'];
        $negativos = 0;
        $positivos = 0;
        $pares = 0;
        $impares = 0;
        foreach($numeros as $n) {
            if($n< 0) {
                $negativos++;
            }
            else{
                $positivos++;
            }
            if($n % 2 == 0) {
                $pares++;
            }
            else{
                $impares++;
            }
        }
        echo "<h3>Quantos negativos foram digitados: $negativos </h3>";
        echo "<h3>Quantos positivos foram digitados: $positivos </h3>";
        echo "<h3>Quantos pares foram digitados: $pares </h3>";
        echo "<h3>Quantos ímpares foram digitados: $impares </h3>";
    }
    
    
    ?>

    </main>
</body>
</html>