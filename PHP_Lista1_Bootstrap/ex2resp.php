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
                        <a class="nav-link active" aria-current="page" href="ex2.php">Ex.2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.6</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.7</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.8</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.9</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ex.10</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <h3>Exercício 02</h3>
        <h5>Escreva um programa que leia 7 números diferentes, imprima o menor valor e imprima a posição do
            menor valor na sequência de entrada</h5>
        <div class="container text-center ">
            <div class="row justify-content-md-center">

                <div class="border border-2 rounded border-danger mt-2 col-md-auto mt-2 mb-2 pt-1 pb-1">
                    <?php
                    include 'funcoes.php';
                    if (isset($_POST["numeros"])) {
                        $numeros = $_POST["numeros"];

                        //Esse exercício eu mantive igual porque não faria sentido criar uma função apenas para chamar outra.

                        //menor valor
                        $menorValor = min($numeros);
                        //posicao
                        $posicaoMenorValor = array_search($menorValor, $numeros);

                        echo "<h5>O menor valor é $menorValor na posição $posicaoMenorValor</h5>";
                    } else {
                        echo "<h5>Números não informados.</h5>";
                    }
                    ?>
                </div>
            </div>
        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>