<?php

namespace Andrey\PHP\DAO;

use Andrey\PHP\Class\Usuario;
use Andrey\PHP\Class\Produto;
use Andrey\PHP\Banco;
use Exception;
use PDO;
use PDOException;

trait ProdutoDAO
{
  private $conexao;

  public function __construct()
  {
    return $this->conexao = Banco::obterConexao();
  }

  // Insere um novo produto no banco de dados
  public static function inserir(Produto $produto, Usuario $usuario)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "INSERT INTO produtos (Nome, Descricao, Categoria, Condicao, Imagem, UserID) VALUES (:nome, :descricao, :categoria, :condicao, :imagem, :userID)";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(':nome', $produto->getNome());
      $stmt->bindValue(':descricao', $produto->getDescricao());
      $stmt->bindValue(':categoria', $produto->getCategoria());
      $stmt->bindValue(':condicao', $produto->getCondicao());
      $stmt->bindValue(':imagem', $produto->getImagem());
      $stmt->bindValue(':userID', $produto->getUserID());
      $stmt->execute();
    } catch (Exception $e) {
      echo 'Erro ao inserir produto' . $e->getMessage();
      return;
    }
  }

  // Atualiza um produto existente no banco de dados
  public function atualizar(Produto $produto)
  {
    $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, categoria = :categoria, condicao = :condicao, imagem = :imagem  WHERE id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':nome', $produto->getNome());
    $stmt->bindValue(':descricao', $produto->getDescricao());
    $stmt->bindValue(':categoria', $produto->getCategoria());
    $stmt->bindValue(':condicao', $produto->getCondicao());
    $stmt->bindValue(':imagem', $produto->getImagem());
    $stmt->execute();
  }

  // Exclui um produto do banco de dados
  public static function excluir($id)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "DELETE FROM produtos WHERE ProdutoID = :id";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
    } catch (Exception $e) {
      echo $e;
    }
  }

  // Retorna um produto pelo ID
  public static function buscarPorId($id)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "SELECT * FROM produtos WHERE ProdutoID = :id";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(':id', $id);
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (Exception $e) {
      echo $e;
    }
  }

  // Retorna um produto pelo ID
  public static function buscarPorNome($nome)
  {
    try {
      $conexao = Banco::obterConexao();
      echo "<br>" . $nome;
      $id = $_SESSION['Usuario']['UserID'];
      $sql = "SELECT * FROM produtos WHERE Nome = :nome AND UserID = $id";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->execute();
      $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
      /* print_r($resultado); */
      return $resultado;
    } catch (Exception $e) {
      echo $e;
    }
  }

  public static function buscarMeusProdutos($UserID)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "SELECT * FROM produtos WHERE UserID = :UserID";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(':UserID', $UserID);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (Exception $e) {
      echo 'Erro ao inserir produto' . $e->getMessage();
      return;
    }
  }

  public static function catalogo($UserID)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "SELECT p.* FROM Produtos p LEFT JOIN Interesses i ON p.ProdutoID = i.ProdutoID WHERE p.UserID != $UserID AND i.ProdutoID IS NULL;";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $resultado;
    } catch (Exception $e) {
      echo 'Erro ao inserir produto' . $e->getMessage();
      return;
    }
  }

  public static function donoProduto($UserID)
  {
    try {
      $conexao = Banco::obterConexao();
      $sql = "SELECT * FROM produtos WHERE UserID != $UserID;";
    } catch (Exception $e) {
    }
  }
}
