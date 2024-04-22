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
    <h1>Exercício 07</h1>
    <h3>Crie um programa em PHP que receba os seguintes dados de 10 alunos: nome, nota1 e nota2. 
        Armazene esses dados em um mapa ordenado que contenha também o armazenamento da média de nota do aluno.
        Seu programa deve imprimir a lista dos aprovados com as médias finais e outra lista dos reprovados sem exibir o valor da média.</h3>
    
    </header>
    <main>
    <?php 
    
    if(isset($_POST['nomes']) && isset($_POST['notas1']) && isset($_POST['notas2'])){
        $nomes = $_POST['nomes'];
        $notas1 = $_POST['notas1'];
        $notas2 = $_POST['notas2'];
        $medias = array();

        for($i=0; $i<10; $i++){
            $media = ($notas1[$i] + $notas2[$i]) / 2;
            $medias[$nomes[$i]] = $media;
        }

        $aprovados = array();
        $reprovados = array();

        foreach($medias as $nom => $m){
            if($m >= 6){
                $aprovados[$nom] = $m;
            }
            else{
                $reprovados[] = $nom;
            }
        }

        echo "<h3>Alunos Aprovados:</h3>";
        echo "<ul>";
        foreach($aprovados as $nom => $not){
            echo "<h3><li>$nom - $not</li></h3>";
        }
        echo "</ul>";
        echo "<h3>Alunos Reprovados:</h3>";
        echo "<ul>";
        foreach($reprovados as $nom){
            echo "<h3><li>$nom</li></h3>";
        }
        echo "</ul>";
        

    }
    
    
    ?>

    </main>
</body>
</html>