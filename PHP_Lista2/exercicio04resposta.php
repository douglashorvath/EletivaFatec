<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 04</title>
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
    <h1>Exercício 04</h1>
    <h3>4.	Crie um vetor que armazene o nome de todos os meses do ano. Peça ao usuário que digite um número e ele informe qual o nome do mês correspondente. </h3>
    </header>
    <main>
    <?php 
        if(isset($_POST["mes"]))
        {
            $ano = array(1=>"Janeiro",
            2=>"Fevereiro",
            3=>"Março",
            4=>"Abril",
            5=>"Maio",
            6=>"Junho",
            7=>"Julho",
            8=>"Agosto",
            9=>"Setembro",
            10=>"Outubro",
            11=>"Novembro",
            12=>"Dezembro");

            $mes = $_POST["mes"];
            echo "<h3>O mês $mes é $ano[$mes]</h3>";
        }
    
    ?>

    </main>
</body>
</html>