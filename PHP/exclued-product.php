<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Produto;


$idProduto = filter_input(INPUT_POST, 'id');
echo $idProduto;
Produto::excluir($idProduto);



header("location: ../../meus-produtos.php");
