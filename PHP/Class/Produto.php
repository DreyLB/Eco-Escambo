<?php

namespace Andrey\PHP\Class;
use Andrey\PHP\DAO\ProdutoDAO;
// Classe Produto
class Produto
{
  use ProdutoDAO;
  private $produtoID;
  private $nome;
  private $descricao;
  private $categoria;
  private $condicao;
  private $imagem;
  private $userID;

  public function __construct($nome, $descricao, $categoria, $condicao, $imagem, $userID)
  {
    $this->nome = $nome;
    $this->descricao = $descricao;
    $this->categoria = $categoria;
    $this->condicao = $condicao;
    $this->imagem = $imagem;
    $this->userID = $userID;
  }

  // Getters e Setters
  public function getProdutoID()
  {
    return $this->produtoID;
  }

  public function setProdutoID($produtoID)
  {
    $this->produtoID = $produtoID;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getCategoria()
  {
    return $this->categoria;
  }

  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;
  }

  public function getCondicao()
  {
    return $this->condicao;
  }

  public function setCondicao($condicao)
  {
    $this->condicao = $condicao;
  }

  public function getImagem()
  {
    return $this->imagem;
  }

  public function setImagem($imagem)
  {
    $this->imagem = $imagem;
  }

  public function getUserID()
  {
    return $this->userID;
  }

  public function setUserID($userID)
  {
    $this->userID = $userID;
  }
}
