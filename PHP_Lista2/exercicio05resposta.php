<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 05</title>
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
    <h1>Exercício 05</h1>
    <h3>Faça um programa que leia 20 números inteiros. Crie, a seguir, um vetor resultante que contenha todos os números primos do vetor digitado. Mostre os valores do vetor resultante.</h3>
    </header>
    <main>
    <?php 
        if(isset($_POST["numeros"]))
        {
            $numeros = $_POST["numeros"];
            $primos = array();
            foreach($numeros as $n)
            {
                $nabs = abs($n);
                if($nabs > 2)
                {
                    $i = 3;
                    while($i < $nabs){
                        
                        if($nabs % $i == 0)
                            break;
                        
                        $i += 2;
                    }
                    if($i >= $nabs){
                        array_push($primos, $n);
                    }
                }
                elseif($nabs == 2){
                    array_push($primos, $n);
                }
            }
            if(count($primos)==0)
                echo "<h3>Nenhum numero primo encontrado</h3>";
            else{
                echo "<h3>Os números primos informados são: ";
                echo "<ul>";
                foreach($primos as $p)
                {
                    echo "<li>$p</li>";
                }
                echo "</ul>";
            }

            
        }
    
    ?>

    </main>
</body>
</html>