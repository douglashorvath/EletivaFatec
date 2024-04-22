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
    <h1>Exercício 06</h1>
    <h3>Faça um programa que receba o nome de 5 produtos e seus respectivos preços, calcule e mostre:  </h3>
    <ol type="a">
        <li>A quantidade de produtos com preço inferior a R$50,00. </li>
        <li>O nome dos produtos com preço entre R$50,00 e R$100,00.  </li>
        <li>A média dos preços dos produtos com preço superior a R$100,00.</li>
    </ol>
    </header>
    <main>
    <?php 

        
    
    if(isset($_POST['produtos']) && isset($_POST['precos'])){
        
        $produtos = $_POST['produtos'];
        $precos = $_POST['precos'];
        $venda = array_combine($produtos, $precos);

        $prod50 = 0;
        $prods50a100 = array();
        $precototal = 0;
        $numeroprods = 0;
        

        foreach($venda as $v)
        {
            if($v < 50)
                $prod50++;
            elseif($v >= 50 && $v <= 100)
            {
                array_push($prods50a100, $v);
            }else{
                $precototal += $v;
                $numeroprods++;
            }
        }

        $media = 0;
        if($numeroprods > 0)
            $media = $precototal / $numeroprods;

        echo "<h3>A quantidade de produtos com preço inferior a R$50,00 é: $prod50 </h3>";
        
        if(!empty($prods50a100))
        {
            echo "<h3>Os produtos com preço entre R$50,00 e R$100,00 são: </h3>";
            echo "<ol>";
            foreach($prods50a100 as $p)
            {
                echo "<h3><li>$p</li></h3>";
            }
            echo "</ol>";
        }
        else{
            echo "<h3>Nenhum produto com preço entre R$50,00 e R$100,00 encontrado</h3>";
        }

        
        if($numeroprods > 0)
        {   
            echo "<h3>A média dos preços dos produtos com preço superior a R$100,00 é: R$ $media </h3>";
        }
        else{
            echo "<h3>Não existem produtos com preço superior a R$100,00</h3>";
        }
        

    }
    
    
    ?>

    </main>
</body>
</html>