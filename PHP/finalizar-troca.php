<?php

namespace Andrey\PHP;

require_once("../../comum.php");

use Andrey\PHP\Class\Troca;

$TrocaID = filter_input(INPUT_POST, 'TrocaID');
$troca = Troca::buscarPorId($TrocaID);
$troca->setStatus('Realizada');
Troca::atualizar($troca);

header('location: ../tenho-interesse.php');
exit;
