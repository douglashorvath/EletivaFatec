<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 01</title>
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
    <h1>Exercício 01</h1>
    <h3>Crie um algoritmo que receba um número digitado pelo usuário e verifique se esse valor é positivo,
negativo ou igual a zero. A saída deve ser: "Valor Positivo", "Valor Negativo" ou "Igual a Zero"</h3>
    </header>
    <main>
    <?php 
    //confere o isset e se o valor não veioo vazio
        if (isset($_POST['numero']) && $_POST['numero'] != "")
        {
            $numero = $_POST['numero'];
            if ($numero > 0)
            {
                echo "<h3>Valor Positivo</h3>";
            }
            else if ($numero < 0)
            {
                echo "<h3>Valor Negativo</h3>";
            }
            else
            {
                echo "<h3>Igual a Zero</h3>";
            }
        }
        else{
            echo "<h3>Nenhum número informado</h3>";
        }
    
    
    ?>
    </main>
</body>
</html>