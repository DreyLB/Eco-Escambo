<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Interesse;
use Andrey\PHP\Class\Produto;
use Andrey\PHP\Class\Troca;
use Exception;

session_start();

$idProduto = filter_input(INPUT_POST, 'id');
echo $idProduto . "<br>";
$idUsuario = $_SESSION['Usuario']['UserID'];
echo $idUsuario . "<br>";

$produto = Produto::buscarPorId($idProduto);
print_r($produto['Condicao']);



$condicao =  Produto::buscarPorNome($produto['Condicao']);
print_r($condicao);
/* if ($condicao == null) {
    header('location: ../catalogo.php?produto_nao_existe=1');
} else { */

    $interesse = new Interesse($idProduto, $idUsuario);
    $troca = new Troca();

    try {
        Interesse::insertInteresse($interesse);
    } catch (Exception $e) {
        echo $e;
    }

    header('location: ../catalogo.php');
/* }
 */