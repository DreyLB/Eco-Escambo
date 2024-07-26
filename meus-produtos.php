<?php

namespace Andrey\PHP;

require_once("../comum.php");

use Andrey\PHP\Class\Produto;

session_start();


function exibirImagemBase64($code)
{
  $mime_type = "image/jpeg";
  $exibir = "data:" . $mime_type . ";base64," . $code;
  return $exibir;
}

$meusProdutos = Produto::buscarMeusProdutos($_SESSION['Usuario']['UserID']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Termos e Condições" />
  <title>Meus Produtos | Eco Escambo </title>
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <script>
    function confirmDeletion(event) {
      if (!confirm("Deseja deletar essa categoria?")) {
        event.preventDefault();
      }
    }
  </script>
</head>

<body id="meus-produtos">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main class="titulo-bg">
    <div>
      <div class="meus-produtos titulo container">
        <p class="font-2-xl cor-5">produtos</p>
        <h1 class="font-1-xxl cor-0">
          meus produtos<span class="cor-p1">.</span>
        </h1>
        <a class="botao" href="./cadastrar-produto.php">Cadastrar Produto</a>
      </div>



      <div class="meu-produto container">
        <?php foreach ($meusProdutos as $produto) { ?>
          <div class="meu-produto-conteudo">
            <div class="meu-produto-imagens">
              <?php $imagem = $produto['Imagem']; ?>
              <img src="<?php echo exibirImagemBase64($imagem); ?>" alt="" />
            </div>
            <div class="botao-meu-produto">
              <p class="font-2-l cor-5"><?php echo $produto['Nome']; ?></p>
              <p class="font-2-l cor-5"><?php echo $produto['Descricao']; ?></p>
              <p class="font-2-l cor-5"><?php echo $produto['Categoria']; ?></p>
              <p class="font-2-l cor-5"><?php echo $produto['Condicao']; ?></p>
            </div>
            <div class="botao-meu-produto">
              <div class="meu-produto-trocar">
                <form action="" type="submit">
                  <button class="botao">Editar</button>
                </form>
                <form action="./PHP/exclued-product.php" method="post">
                  <button class="botao excluir" onclick="confirmDeletion(event)" type=" submit" name="id" value="<?php echo $produto['ProdutoID']; ?>">Excluir</button>
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </main>

  <!-- Rodapé -->
  <?php require_once('./PHP/modularizadas/footer.php'); ?>
</body>

</html>