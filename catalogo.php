<?php

namespace Andrey\PHP;

require_once("../comum.php");

use Andrey\PHP\Class\Produto;
use Andrey\PHP\Class\Usuario;

session_start();


function exibirImagemBase64($code)
{
  $mime_type = "image/jpeg";
  $exibir = "data:" . $mime_type . ";base64," . $code;
  return $exibir;
}

$produtosCatalogo = Produto::catalogo($_SESSION['Usuario']['UserID']);


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Termos e Condições" />
  <title>Eco Escambo</title>
  <link rel="stylesheet" href="../css/style.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />

  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const itemsPerPage = 9;
      const items = document.querySelectorAll('#item-list li');
      const paginationControls = document.getElementById('pagination-controls');
      let currentPage = 1;
      const totalPages = Math.ceil(items.length / itemsPerPage);

      function showPage(page) {
        items.forEach((item, index) => {
          item.classList.add('hidden');
          if (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) {
            item.classList.remove('hidden');
          }
        });
        updatePaginationControls();
      }

      function updatePaginationControls() {
        paginationControls.innerHTML = '';
        for (let i = 1; i <= totalPages; i++) {
          const button = document.createElement('button');
          button.textContent = i;
          button.classList.add('page-button');
          if (i === currentPage) {
            button.disabled = true;
          }
          button.addEventListener('click', () => {
            currentPage = i;
            showPage(currentPage);
          });
          paginationControls.appendChild(button);
        }
      }

      showPage(currentPage);
    });
  </script>


</head>

<body id="catalogo">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main>
    <div class="titulo-bg">
      <div class="titulo container">
        <p class="font-2-l-b cor-5">produtos</p>
        <h1 class="font-1-xxl cor-0">catálogo de produtos<span class="cor-p1">.</span></h1>
      </div>
    </div>
  </main>

  <article class="produtos-lista container">
    <h2 class="container font-1-xxl">
      escolha a sua<span class="cor-p1">.</span>
    </h2>

    <?php if(isset($_GET['produto_nao_existe'])){echo  '<p class="erro">Você não possui o produto da condição!</p>';} ?>




    <ul id="item-list">
      <?php foreach ($produtosCatalogo as $produtoCatalogo) { ?>
        <li>

          <?php $imagem = $produtoCatalogo['Imagem']; ?>
          <div class="fundo-imagem">
            <img src="<?php echo exibirImagemBase64($imagem); ?>" alt="Produto" />
          </div>
          <h3><?php echo $produtoCatalogo['Nome']; ?></h3>
          <span class="font-2-m cor-8">Usuário: <?php

                                                $usuario = Usuario::buscarPorId($produtoCatalogo['UserID']);

                                                echo $usuario['Nome'];
                                                ?></span>
          <p><span class="font-2-m cor-8"><?php echo $produtoCatalogo['Descricao']; ?></span></p>
          <p class="font-2-l cor-5">Condição: <?php echo $produtoCatalogo['Condicao']; ?></p>

          <form action="./PHP/interessar.php" method="post">
            <button class="botao" type="submit" name="id" value="<?= $produtoCatalogo['ProdutoID']; ?>">Interessar</button>
          </form>
        </li>
      <?php } ?>
    </ul>

    <!-- <ul id="item-list">


      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>


      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

      <li>
        <div class="fundo-imagem">
          <img src="imagem" alt="Produto" />
        </div>
        <h3>nome</h3>
        <span class="font-2-m cor-8">Usuário: Nome</span>
        <p><span class="font-2-m cor-8">Descricao</span></p>
        <p class="font-2-l cor-5">Condição: outro produto</p>

        <form action="./PHP/interessar.php" method="post">
          <button class="botao" type="submit" name="id" value="">Interessar</button>
        </form>
      </li>

    </ul> -->


    <div class="pagination" id="pagination-controls"></div>

  </article>

  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php'); ?>




</body>

</html>

<!-- 
<ul>


  <li>


    <div class="fundo-imagem">
      <img src="imagem" alt="Produto" />
    </div>
    <h3>nome</h3>
    <span class="font-2-m cor-8">Usuário: Nome</span>
    <p><span class="font-2-m cor-8">Descricao</span></p>
    <p class="font-2-l cor-5">Condição: outro produto</p>

    <form action="./PHP/interessar.php" method="post">
      <button class="botao" type="submit" name="id" value="">Interessar</button>
    </form>
  </li>

  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>
  <div class="fundo-imagem">
    <img src="imagem" alt="Produto" />
  </div>
  <h3>nome</h3>
  <span class="font-2-m cor-8">Usuário: Nome</span>
  <p><span class="font-2-m cor-8">Descricao</span></p>
  <p class="font-2-l cor-5">Condição: outro produto</p>

  <form action="./PHP/interessar.php" method="post">
    <button class="botao" type="submit" name="id" value="">Interessar</button>
  </form>
  </li>


</ul> -->