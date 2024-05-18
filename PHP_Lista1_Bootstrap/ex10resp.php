<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista PHP Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://www.pngall.com/wp-content/uploads/15/Detroit-Tigers-Logo-PNG-Image-HD.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                Exercícios PHP-Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Ex.1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex2.php">Ex.2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex3.php">Ex.3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex4.php">Ex.4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex5.php">Ex.5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex6.php">Ex.6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex7.php">Ex.7</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex8.php">Ex.8</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ex9.php">Ex.9</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="ex10.php">Ex.10</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <h3>Exercício 10</h3>
        <h5>Crie uma página em HTML5 na qual a pessoa possa digitar seu peso e sua altura e um programa PHP
            para o cálculo do IMC da pessoa. Defina se a pessoa está acima ou abaixo do peso. Procure referências
            sobre este índice (o que é considerado normal, abaixo ou acima do peso). Inclua a referência (página
            de acesso) para que a pessoa leia sobre este assunto.</h5>
        <div class="container text-center ">
            <div class="row justify-content-md-center">

                <div class="border border-2 rounded border-danger mt-2 col-md-auto mt-2 mb-2 pt-1 pb-1">
                    <?php
                    include 'funcoes.php';
                    if (isset($_POST['peso']) && $_POST['peso'] != "" && isset($_POST['altura']) && $_POST['altura'] != "") {
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
                        $imc = calculaIMC($peso, $altura / 100);
                        if ($imc < 18.5) {
                            echo "<h5> Abaixo do peso </h5>";
                        } elseif ($imc >= 18.5 && $imc <= 24.9) {
                            echo "<h5> Peso ideal </h3>";
                        } else {
                            echo "<h5> Acima do Peso </h5>";
                        }
                        echo '<a href="https://www.tuasaude.com/imc/"><h6>Link para referência</h6></a>';
                    } else {
                        echo "<h5>Número Inválido</h5>";
                    }
                    ?>
                </div>
            </div>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>