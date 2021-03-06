<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{$basehref}">
    {* resuelve que si hago arboles/1 en el link no me haga arboles/arboles/1 sino arboles/1 *}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$tituloPagina}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>

<body>
<nav class="navbar navbar-light bg-warning">
  <a class="navbar-brand" href="home">
    <img class="rounded" src="https://i0.pngocean.com/files/920/698/446/cartoon-fruit-trees-logo.jpg" width="30" height="30" alt="">
  </a>
  <h5>Club Amigos de los Árboles</h5>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="especies"> Especies </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="arboles"> Arboles </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Detalle de especies
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        {foreach $especies as $especie}
          <a class="dropdown-item" href="especies/{$especie->id_especie}">{$especie->nombre}</a>
        {/foreach}
        </div>
      </li>
    </ul>
  </div>
</nav>
<a href="http://www.arbolapp.es/especies-nombre-cientifico/"> Si te faltan arboles </a>