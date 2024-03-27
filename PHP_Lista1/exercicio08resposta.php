<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 08</title>
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
        <h1>Exercício 08</h1>
        <h3>Faça um programa em PHO para uma loja de tintas. O programa deverá pedir o tamanho em metros
quadrados da área a ser pintada. Considere que a cobertura da tinta é de 1 litro para cada 3 metros
quadrados e que a tinta é vendida em latas de 18 litros, que custam R$ 80,00. Informe ao usuário a
quantidades de latas de tinta a serem compradas e o preço total
    </header>
    <main>
    <?php 
        if(isset($_POST['metros']) && $_POST['metros'] != "")
        {
            $metros = $_POST['metros'];
            $litros = $metros / 3;
            $latas = ceil($litros / 18);
            $custo = $latas * 80;
            echo "<h3>Serão necessárias $latas latas para seu projeto. O Custo total é de R$ $custo</h3>";	
        }
        else{
            echo "<h3>Número Inválido</h3>";
        }
    ?>

    </main>
</body>
</html>