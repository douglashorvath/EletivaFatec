<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema Academia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="css/style.css" rel="stylesheet"></script>

  <script>
    function errorMessage(erro) {
      Swal.fire({
        text: erro,
        icon: 'error',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
      })
    }

    function successMessage(msg) {
      Swal.fire({
        text: msg,
        icon: 'success',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
      })
    }
  </script>

  <?php require_once("../classes/funcao.php"); ?>

</head>

<body class="bg-black">
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class=" container-fluid">
      <a class="navbar-brand" href="#">Sistema Academia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Membros
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="adicionarMembro.php">Adicionar Membro</a></li>
              <li><a class="dropdown-item" href="exibirMembros.php">Pesquisar Membros</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Instrutores
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="adicionarInstrutor.php">Adicionar Instrutor</a></li>
              <li><a class="dropdown-item" href="exibirInstrutores.php">Pesquisar Instrutores</a></li>
            </ul>
          </li>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Aulas
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Adicionar Aula</a></li>
              <li><a class="dropdown-item" href="#">Visualizar Aulas</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Participação
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Registrar Participação</a></li>
              <li><a class="dropdown-item" href="#">Visualizar Presenças</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="container">