<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Troca;

$produtoID = filter_input(INPUT_POST, 'id');
$trocaID = Troca::buscarProdutosTrocaPorProduto($produtoID)['TrocaID'];
$troca = Troca::buscarPorId($trocaID);
$troca->setStatus('Aceito');
Troca::atualizar($troca);
echo $troca->getStatus();
header('location: ../interessados.php');
exit;
