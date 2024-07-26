<?php

ob_start();

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

/* Se estiver logado */
if (isset($_SESSION["logado"]) && $_SESSION["logado"] == true) { ?>

  <header class="header-bg">
    <div class="header container">
      <a href="./">
        <img src="./img/logoEcoEscambo.svg" alt="Logo EcoEscambo" />
      </a>

      <nav aria-label="primaria">
        <ul class="header-menu font-1-m cor-0">
          <li><a href="./catalogo.php">Catálogo</a></li>
          <li><a href="./meus-produtos.php">Meus Produtos</a></li>
          <li><a href="./tenho-interesse.php">Tenho Interesse</a></li>
          <li><a href="./interessados.php">Interessados</a></li>
          <li><a href="./PHP/over.php">Sair</a></li>
        </ul>
      </nav>

    </div>
  </header>

<?php
}

/* Se não estiver logado */ else { ?>

  <header class="header-bg">
    <div class="header container">
      <a href="./">
        <img src="./img/logoEcoEscambo.svg" alt="Logo EcoEscambo" />
      </a>

      <nav aria-label="primaria">
        <ul class="header-menu font-1-m cor-0">
          <li><a href="./login.php">Login</a></li>
          <li><a href="./cadastro.php">Cadastro</a></li>
        </ul>
      </nav>
    </div>
  </header>

<?php
}
