<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Termos e Condições" />
  <title>Login | Eco Escambo</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
</head>

<body id="login">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main class="titulo-bg">
    <section class=" container">

      <form action="./PHP/recuperar.php" method="post" class="form">
        <ul>
          <li class="login-erro">

            <?php
            if (isset($_GET["erro"])) {
              echo "As senhas não conferem!";
            }
            ?>
          </li>

          <li>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required />
          </li>

          <li>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" />
          </li>

          <li>
            <a href="./recuperar-senha"> Esqueceu a senha </a>
          </li>

          <li>
            <input type="submit" value="Entrar" class="botao" />
          </li>

          <div class="login-cadastro">

            <span>Ainda Não é Usuário?</span>
            <a class="cor-p1" href="cadastro.php"> Cadastre-se </a>
          </div>

        </ul>
      </form>

    </section>
  </main>

  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php');?>



</body>

</html>