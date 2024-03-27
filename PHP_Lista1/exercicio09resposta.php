<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 09</title>
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
        <h1>Exercício 09</h1>
        <h3>Faça um script PHP que receba de um formulário HTML5 uma variável com o ano de nascimento de
        uma pessoa, crie uma constante com o ano atual, calcule e mostre:
        <br>a. a idade dessa pessoa em anos;
        <br>b. quantos dias esta pessoa já viveu;
        <br>c. quantos anos essa pessoa terá em 2025</h3>

    </header>
    <main>
    <?php 
        define ("ANO_ATUAL", 2024);

        if(isset($_POST['ano']) && $_POST['ano'] != "")
        {
            $anoNascimento = $_POST['ano']; 
            $idade = ANO_ATUAL - $anoNascimento;
            $dias = $idade * 365;
            $idade2025 = 2025 - $anoNascimento;
            echo "<h3> Idade: $idade</h3>";
            echo "<h3> Dias Vividos: $dias </h3>";
            echo "<h3> Idade em 2025: $idade2025 </h3>";
        }
        else{
            echo "<h3>Ano Inválido</h3>";
        }
    ?>

    </main>
</body>
</html>