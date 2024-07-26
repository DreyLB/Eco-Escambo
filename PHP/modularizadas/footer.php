<footer class="footer-bg">
  <div class="footer container">
    <img src="./img/logoEcoEscambo.svg" alt="Eco Escambo" />

    <div class="footer-contato">
      <h3 class="font-2-l-b cor-0">Contato</h3>
      <ul class="font-2-m cor-5">
        <li><a href="tel:+55219999999999">+55 21 99999-9999</a></li>
        <li>
          <a href="mailto:contato@contato.com">contato@escoescambo.com</a>
        </li>
        <li>Rua Ali Perto, 42 - Botafogo</li>
        <li>Rio de Janeiro - RJ</li>
      </ul>

      <div class="footer-redes">
        <a href="./">
          <img src="./img/redes/instagram.svg" alt="Instagram" />
        </a>
        <a href="./">
          <img src="./img/redes/facebook.svg" alt="Facebook" />
        </a>
        <a href="./">
          <img src="./img/redes/youtube.svg" alt="Youtube" />
        </a>
      </div>
    </div>

    <div class="footer-informacoes">
      <h3 class="font-2-l-b cor-0">Informações</h3>
      <nav>
        <ul class="font-1-m cor-5">
          <li><a href="<?php if (isset($_SESSION["logado"])) {
                          echo './catalogo.php';
                        } else {
                          echo './';
                        } ?>">Catálogo</a></li>
          <li>Desenvolvedores:</li>
          <li>Andrey Barros</li>
          <li>Juan Fernandes</li>
          <li>Felipe da França</li>
        </ul>
      </nav>
    </div>

    <p class="footer-copy font-2-m cor-6">
      EcoEscambo © Alguns direitos reservados.
    </p>
  </div>
</footer>