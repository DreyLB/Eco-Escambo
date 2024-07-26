<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Cadastro de Usuário" />
  <title>Cadastro | Eco Escambo</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
</head>
<body id="cadastro">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main class="titulo-bg">
    <section class="container">

      <form id="formCad" method="post" action="./PHP/cadastro-user.php" class="form">
        <ul>
          <li class="font-2-l cor-p1">Cadastrar-se</li>
          <li class="login-erro">
            <?php
            if (isset($_GET["erroSenha"])) {
              echo "<p style='color: red;'>As senhas não conferem!</p>";
            }
            if (isset($_GET["coincidEmail"])) {
              echo "<p style='color: red;'>E-mail já utilizado.</p>";
            }
            ?>
          </li>

          <li>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="input" required />
            <span id="error-email" class="message-erro">
              Insira um email válido
            </span>
          </li>

          <li>
            <label for="usuario">Nome de Usuário:</label>
            <input type="text" name="usuario" id="usuario" class="input" required />
          </li>

          <li>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senhaCad" class="input" required />
            <span id="error-message" class="message-erro">
              A senha deve ter pelo menos 6 caracteres, incluindo letras maiúsculas, minúsculas e números.
            </span>
          </li>

          <li>
            <label for="senha_confirma">Confirme a Senha:</label>
            <input type="password" name="senha_confirma" id="confirmCad" class="input" required />
            <span id="error-confirm" class="message-erro">
              As senhas não conferem
            </span>
          </li>

          <li>
            <input type="submit" value="Cadastrar" class="botao" />
          </li>
        </ul>
      </form>

    </section>
  </main>

  <script src="./js/cadastro.js"></script>
  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php'); ?>
  
</body>
</html>
