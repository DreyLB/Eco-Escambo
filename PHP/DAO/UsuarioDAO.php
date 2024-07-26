<?php

namespace Andrey\PHP\DAO;

use Andrey\PHP\Class\Usuario;
use Andrey\PHP\Banco;
use Exception;
use PDO;
use PDOException;

trait UsuarioDAO
{
  private $conexao;

  public static function rowMapper($nome, $email, $senha)
  {
    return new Usuario($nome, $email, $senha);
  }

  public function __construct()
  {
    $this->conexao = Banco::obterConexao();
  }

  // Insere um novo usuário no banco de dados
  public static function inserir($usuario)
  {
    try {
      $conexao = Banco::obterConexao();
    } catch (Exception $e) {
      echo $e;
    }
    $sql = "INSERT INTO usuarios (Nome, Email, Senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(':nome', $usuario->getNome());
    $stmt->bindValue(':email', $usuario->getEmail());
    $stmt->bindValue(':senha', $usuario->getSenha());
    $stmt->execute();
  }

  // Atualiza um usuário existente no banco de dados
  public function atualizar($usuario)
  {
    $sql = "UPDATE usuarios SET Nome = :nome, Email = :email, Senha = :senha WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $usuario->getUserID());
    $stmt->bindValue(':nome', $usuario->getNome());
    $stmt->bindValue(':email', $usuario->getEmail());
    $stmt->bindValue(':senha', $usuario->getSenha());
    $stmt->execute();
  }

  // Exclui um usuário do banco de dados
  public function excluir($id)
  {
    $sql = "DELETE FROM usuarios WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
  }

  // Retorna um usuário pelo ID
  public static function buscarPorId($id)
  {

    try {
      $conexao = Banco::obterConexao();

      try {
        $sql = $conexao->query("SELECT * FROM usuarios WHERE UserID = $id");
        $resultado = $sql->fetch();
        if ($resultado) {
          return $resultado;
        } else {
          return null;
        }
      } catch (Exception $erro) {
        echo $erro->getMessage();
      }
    } catch (PDOException $e) {
      echo "Erro ao conectar ao banco de dados para mudar E-mail: " . $e->getMessage();
    }
  }

  public static function buscarPorEmail($email)
  {
    try {
      $conexao = Banco::obterConexao();

      try {
        $sql = $conexao->query("SELECT * FROM usuarios WHERE Email = '$email'");
        $resultado = $sql->fetchAll();

        if ($resultado) {
          $_SESSION["user"] = new Usuario($resultado[0]['Nome'], $resultado[0]['Email'], $resultado[0]['Senha']);
          return $resultado;
        } else {
          
          return null;
        }
      } catch (Exception $erro) {
        echo $erro->getMessage();
      }
    } catch (PDOException $e) {
      echo "Erro ao conectar ao banco de dados para mudar E-mail: " . $e->getMessage();
    }
  }
}
