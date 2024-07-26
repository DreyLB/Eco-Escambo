<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Usuario;

session_start();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

if ($email && $password) {

    $usuario = Usuario::buscarPorEmail($email);
    $_SESSION['Usuario'] = $usuario[0];

    if (($usuario[0]['Email']) && ($usuario[0]['Senha'])) {
        session_start();
        $_SESSION["logado"] = true;
        $user = new Usuario($usuario[0]['Nome'], $usuario[0]['Email'], $usuario[0]['Senha']);

        header("location: ../../index.php");
    } else {
        header("location: ../../login.php?erro=1");
        exit;
    }
} else {
    $usuario = null;
    header("location: ../../login.php");
}
