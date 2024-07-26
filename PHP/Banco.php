<?php

namespace Andrey\PHP;
use PDO;

abstract class Banco
{
  public static function obterConexao()
  {
    $host = 'localhost';
    $nomeBanco = 'eco-escambo';
    $usuario = 'root';
    $senha = '';
    
    $conexao = new PDO("mysql:host=$host;dbname=$nomeBanco", $usuario, $senha);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexao;
  }
}
