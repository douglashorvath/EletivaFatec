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
    <?php 

        if(isset($_POST['peso']) && $_POST['peso'] != "" && isset($_POST['altura']) && $_POST['altura'] != "")
        {
            $peso = $_POST['peso'];
            $altura = $_POST['altura'];
            $imc = $peso / ($altura * $altura);
            if($imc < 18.5)
            {
                echo "<h3> Abaixo do peso </h3>";
            }elseif($imc >= 18.5 && $imc <= 24.9)
            {
                echo "<h3> Peso ideal </h3>";
            }else
            {
                echo "<h3> Acima do Peso </h3>";
            }
            echo '<a href="https://www.tuasaude.com/imc/"><h3>Link para referência</h3></a>';
        }
        else{
            echo "<h3>Dados inválidos</h3>";
        }
    ?>

    </main>
</body>
</html>