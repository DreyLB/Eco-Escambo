<?php

namespace Andrey\PHP\DAO;

use Andrey\PHP\Class\Troca;
use Andrey\PHP\Banco;
use Exception;
use PDO;
use PDOException;

trait TrocaDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Banco::obterConexao();
    }

    // Insere uma nova troca no banco de dados
    public static function inserirTroca(Troca $troca)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "INSERT INTO Trocas (Data, Status) VALUES (NOW(), 'Pendente')";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            return 'Error: ' . $e;
        }
    }

    // Atualiza uma troca existente no banco de dados
    public static function atualizar(Troca $troca)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "UPDATE Trocas SET Data = :data, Status = :status WHERE TrocaID = :trocaID";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':trocaID', $troca->getTrocaID());
            $stmt->bindValue(':data', $troca->getData());
            $stmt->bindValue(':status', $troca->getStatus());
            $stmt->execute();
        } catch (Exception $e) {
            return 'Error: ' . $e;
        }
    }

    // Exclui uma troca do banco de dados
    public function excluir($trocaID)
    {
        $sql = "DELETE FROM Troca WHERE TrocaID = :trocaID";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':trocaID', $trocaID);
        $stmt->execute();
    }

    // Retorna uma troca pelo ID
    public static function buscarPorId($trocaID)
    {
        try {
            $conexao = Banco::obterConexao();
        } catch (Exception $e) {
            return 'Error: ' . $e;
        }
        $sql = "SELECT * FROM Trocas WHERE TrocaID = :trocaID";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':trocaID', $trocaID);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $troca = new Troca($resultado['Data'], $resultado['Status']);
            $troca->setTrocaID($resultado['TrocaID']);
            return $troca;
        } else {
            return null;
        }
    }

    public static function buscarProdutosTrocaPorProduto($ProdutoID)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "SELECT * FROM Produtos_troca WHERE ProdutoID = :produtoID";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':produtoID', $ProdutoID);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            /* print_r($resultado); */
            return $resultado;
        } catch (Exception $e) {
            echo "Erro ao buscar trocas por produto: " . $e->getMessage();
            return;
        }
    }

    public static function iniciarTroca($ProdutoID, $UserID)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "INSERT INTO trocas (produtoid, userid) VALUES ($ProdutoID, $UserID)";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e;
        }
    }

    public static function obterIdUltimaTroca($ProdutoID)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "SET @id_troca = LAST_INSERT_ID(); INSERT INTO Produtos_Troca (ProdutoID, TrocaID)
        VALUES ($ProdutoID, @ultima_troca_id);";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e;
        }
    }

    public static function inserirProdutoTroca($TrocaID, $ProdutoID)
    {
        $conexao = Banco::obterConexao();
        $sql = "INSERT INTO produtos_troca (ProdutoID, TrocaID) VALUES ($ProdutoID, $TrocaID)";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
    }
}
