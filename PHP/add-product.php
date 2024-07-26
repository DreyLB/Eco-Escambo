<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Produto;
use Andrey\PHP\Class\Usuario;

function urlToBase64($imagem)
{
  $imageContent = file_get_contents($imagem);
  if ($imageContent !== false) {
    $base64 = base64_encode($imageContent);
    return $base64;
  }
  return null;
}

session_start();

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
$condicao = filter_input(INPUT_POST, 'condicao', FILTER_SANITIZE_STRING);

/* var_dump(urlToBase64($_POST('foto'))); */
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
  $imagem = urlToBase64($_FILES['foto']['tmp_name']);
}

$idUsuario =  $_SESSION['Usuario']['UserID'];
$user = $_SESSION['Usuario'];

$produto = new Produto($nome, $descricao, $categoria, $condicao, $imagem, $idUsuario);
$usuario = new Usuario($user['Nome'], $user['Email'], $user['Senha']);
echo $idUsuario;
$cadastrar = Produto::inserir($produto, $usuario);
header("location: ../../meus-produtos.php");
