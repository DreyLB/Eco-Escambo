<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Usuario;
use Exception;

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$userName = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$password_confirm = filter_input(INPUT_POST, 'senha_confirma', FILTER_SANITIZE_STRING);

if ($password === $password_confirm) {
  try {
    $usuario = new Usuario($userName, $email, $password);
    $cadastrar = Usuario::inserir($usuario);
    session_start();
    $usuarioLogado = Usuario::buscarPorEmail($email);
    $_SESSION['Usuario'] = $usuarioLogado[0];
    $_SESSION["logado"] = true;
    header("location: ../../index.php");

  } catch (Exception) {
    header("location: ../../cadastro.php?coincidEmail=1");

  }
  catch(Exception $e){
    echo $e;
    /* header("location: ../../cadastro.php?coincidEmail=1"); */

  }
} else {
  header("location: ../../cadastro.php?erroSenha=1");
}
