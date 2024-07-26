<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Produto;

session_start();


function exibirImagemBase64($code)
{
  $mime_type = "image/jpeg";
  $exibir = "data:" . $mime_type . ";base64," . $code;
  return $exibir;
}

$produtosCatalogo = Produto::catalogo($_SESSION['Usuario']['UserID']);
print_r($produtosCatalogo);
?>
