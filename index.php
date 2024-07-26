<?php session_start() ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Termos e Condições" />
  <title>Eco Escambo</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
</head>

<body id="index">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <!-- Conteúdo da Página -->
  <main class="introducao-bg">
    <div class="introducao container">
      <div class="introducao-conteudo">
        <h1 class="font-1-xxl cor-0">
          Escambos feitos sob medida<span class="cor-p1">.</span>
        </h1>
        <p class="texto-2-l cor-5">
          Troca de itens de alta qualidade, feitos sob medida
          para você. Explore o mundo das trocas no Eco Escambo
        </p>
        <a href="<?php if (isset($_SESSION["logado"])) {
                    echo './catalogo.php';
                  } else {
                    echo './';
                  } ?>" class="botao">Troque Agora</a>
      </div>

      <div>
        <img src="./img/produtos/produto_introducao.svg" alt="Produto de troca" />
      </div>

    </div>
  </main>

  <!-- Slides de Propagandas -->
  <article class="destaques container">
    <h2 class="container font-1-xxl">
      destaques da semana<span class="cor-p1">.</span>
    </h2>


    <div class="carrossel">
      <input type="radio" name="carrossel" id="slide1" checked>
      <input type="radio" name="carrossel" id="slide2">
      <input type="radio" name="carrossel" id="slide3">
      <input type="radio" name="carrossel" id="slide4">

      <ul class="slides">


        <a class="slide" href="<?php if (isset($_SESSION["logado"])) {
                                  echo './catalogo.php';
                                } else {
                                  echo './';
                                } ?>">
          <li>
            <img src="./img/designs/design1.svg" alt="" />

          </li>
        </a>

        <a class="slide" href="<?php if (isset($_SESSION["logado"])) {
                                  echo './catalogo.php';
                                } else {
                                  echo './';
                                } ?>">
          <li>
            <img src="./img/designs/design2.svg" alt="" />

          </li>
        </a>

        <a class="slide" href="<?php if (isset($_SESSION["logado"])) {
                                  echo './catalogo.php';
                                } else {
                                  echo './';
                                } ?>">
          <li>

            <img src="./img/produtos/iphone-15.jpg" alt="" />
          </li>
        </a>

        <a class="slide" href="<?php if (isset($_SESSION["logado"])) {
                                  echo './catalogo.php';
                                } else {
                                  echo './';
                                } ?>">
          <li>
            <img src="./img/designs/design2.svg" alt="" />

          </li>
        </a>
      </ul>

      <div class="navigation">
        <label for="slide1"></label>
        <label for="slide2"></label>
        <label for="slide3"></label>
        <label for="slide4"></label>
      </div>


    </div>

  </article>

  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php'); ?>

</body>

</html>