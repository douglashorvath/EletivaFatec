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
    <h3>Entre com os dados de 10 alunos de uma classe, recebendo as informações como nome e uma nota do aluno. Armazene estes dados em um mapa ordenado. 
        Ao final do programa mostrar a média de nota da classe, e o nome do aluno que obteve maior nota. </h3>
    </header>
    <main>
    <?php 
    //confere o isset e se o valor não veioo vazio
        if(isset($_POST["notas"]) && isset($_POST["nomes"])) 
        {
            $notas = $_POST["notas"];
            $nomes = $_POST["nomes"];

            //maior nota
            $maiorNota = max($notas);
            //posicao da maior nota
            $posicaoMaiorNota = array_search($$maiorNota, $notas);
            $alunoMaiorNota = $nomes[$posicaoMaiorNota];

            //média
            $media = array_sum($notas) / count($notas);

            echo "<h3>A maior Nota é $maiorNota do aluno $alunoMaiorNota </h3>";
            echo "<h3>A média é $media</h3>";
            
        }
    
    
    ?>
    </main>
</body>
</html>