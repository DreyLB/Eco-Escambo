<?php

namespace Andrey\PHP;

require_once("../comum.php");

use Andrey\PHP\Class\Interesse;

session_start();


function exibirImagemBase64($code)
{
  $mime_type = "image/jpeg";
  $exibir = "data:" . $mime_type . ";base64," . $code;
  return $exibir;
}

$meusInteresses = Interesse::meusInteresses($_SESSION['Usuario']['UserID']);
/* print_r($meusInteresses[0]); */
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
</head>

<body id="tenho-interesse">

  <!-- Cabeçalho -->
  <?php require_once('./PHP/modularizadas/header.php'); ?>

  <main class="titulo-bg">
    <div>
      <div class="meus-produtos titulo container">
        <p class="font-2-xl cor-5">interesses</p>
        <h1 class="font-1-xxl cor-0">
          tenho interesse<span class="cor-p1">.</span>
        </h1>
        <div>
          <p class="botao">Pendente</p>
          <p class="botao aceito">Aceito</p>
        </div>

      </div>



      <div class="meu-produto container">

        <?php foreach ($meusInteresses as $interesse) { ?>
          <div class="meu-produto-conteudo">
            <div class="meu-produto-imagens status">
              <p class="status-simbolo <?php echo $interesse['TrocaStatus']; ?>"></p>
              <img src="<?php echo exibirImagemBase64($interesse['Imagem']); ?>" alt="" />
            </div>
            <div>
              <p class="font-2-l cor-5"><span class="cor-p1">Produto: </span><?php echo $interesse['Nome']; ?></p>
              <p class="font-2-l cor-5"><span class="cor-p1">Dono do produto: </span><?php echo $interesse['NomeDonoProduto']; ?></p>
              <p class="font-2-l cor-5"><span class="cor-p1">Troca por: </span><?php echo $interesse['Condicao']; ?></p>
            </div>
            <div class="meu-produto-trocar">
              <div>
                <?php

                if ($interesse['TrocaStatus'] == 'Aceito') {
                  $statusanalise = 'analise';
                  echo $statusanalise;
                } else if ($interesse['TrocaStatus'] == 'Pendente') {
                  $statuspendente = 'pendente';
                  echo $statuspendente;
                }
                ?>
                <form action="./PHP/finalizar-troca.php" method="post">
                  <button class="botao interesse  <?php echo $statusanalise; ?>" name="TrocaID" value="<?php echo $interesse['TrocaID']; ?>">Trocar</button>
                </form>
                <p class=" botao interesse <?php echo $statuspendente; ?>">Em Analise</p>
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