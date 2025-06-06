<?php

use Microblog\Services\CategoriaServico;

$categoriaServico = new CategoriaServico();
$listaDeCategorias = $categoriaServico->listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Microblog</title>
  <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex flex-column h-100">

  <header id="topo" class="border-bottom sticky-top">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <h1 class="ms-n1"><a class="navbar-brand" href="index.php">Microblog</a></h1>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorias
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php foreach ($listaDeCategorias as $itemCategoria) { ?>
                  <li>
                    <a class="dropdown-item"
                      href="noticias-por-categoria.php?id=<?= $itemCategoria['id'] ?>">
                      <?= $itemCategoria['nome'] ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin/index.php"><i class="bi bi-lock-fill"></i> Área administrativa</a>
            </li>
          </ul>

          <div class="position-relative">
            <form autocomplete="off" class="d-flex" action="resultados.php" method="POST" onsubmit="return false" id="form-busca">
              <input id="campo-busca" name="busca" class="form-control me-2" type="search" placeholder="Pesquise aqui" aria-label="Pesquise aqui">
            </form>

            <!-- Div manipulada pelo busca.js -->
            <div id="resultados" class="mt-3 position-absolute container bg-white shadow-lg p-3 rounded"></div>
          </div>

        </div>
      </div>
    </nav>

  </header>

  <main class="flex-shrink-0">
    <div class="container">