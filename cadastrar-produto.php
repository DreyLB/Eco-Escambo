<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Termos e Condições" />
  <title>Adicionar produto</title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
</head>

<body id="cadastrar-produto">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main class="titulo-bg">
    <section class=" container">

      <form action="./PHP/add-product.php" enctype="multipart/form-data" method="post" class="form">
        <ul>
          <li>
            <label for="foto">Foto</label>
            <input class="cor-p1" type="file" name="foto" id="foto" required />
          </li>
          <li>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" />
          </li>
          <li>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" />
          </li>
          <li>
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" />
          </li>
          <li>
            <label for="condicao">Condição</label>
            <input type="text" name="condicao" id="condicao" />
          </li>
          <li>
            <button type="submit" class="botao">Adicionar Produto</button>
          </li>
        </ul>
      </form>

    </section>
  </main>

  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php'); ?>
</body>

</html>