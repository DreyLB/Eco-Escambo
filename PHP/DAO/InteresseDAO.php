<?php

namespace Andrey\PHP\DAO;

use Andrey\PHP\Class\Interesse;
use Andrey\PHP\Banco;
use Exception;
use PDO;
use PDOException;


trait InteresseDAO
{
    private $conn;

    // Construtor
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    // Inserir novo interesse
    public static function insertInteresse(Interesse $interesse)
    {
        try {
            $conexao = Banco::obterConexao();
            /* Iniciar transação */
            $conexao->beginTransaction();

            /* Inserir Interesse */
            $sql = "INSERT INTO Interesses (ProdutoID, InteressadoID, DataInteresse) VALUES (:produtoId, :userId, NOW())";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':produtoId', $interesse->getProdutoID());
            $stmt->bindValue(':userId', $interesse->getInteressadoID());
            $stmt->execute();

            /* Realizar troca */
            $sql = "INSERT INTO Trocas (Data, Status) VALUES (NOW(), 'Pendente')";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            $ultimaTrocaID = $conexao->lastInsertId();

            /* Inserir em Produtos_Troca */
            $stmt = $conexao->prepare('INSERT INTO Produtos_Troca (ProdutoID, TrocaID) VALUES (:produtoID, :trocaID)');
            $stmt->execute([
                ':produtoID' => $interesse->getProdutoID(),
                ':trocaID' => $ultimaTrocaID
            ]);

            /* Finalizando transacao */
            $conexao->commit();
        } catch (Exception $e) {
            return 'Erro ao enviar interesse: ' . $e;
        }
    }

    // Deletar interesse por ID
    public function deleteInteresseById($interesseID)
    {
        $sql = "DELETE FROM Interesses WHERE InteresseID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $interesseID);
        return $stmt->execute();
    }

    public static function meusInteresses($UserID)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "SELECT p.*, t.TrocaID, t.Status AS TrocaStatus, u.Nome AS NomeDonoProduto FROM Produtos p INNER JOIN Interesses i ON p.ProdutoID = i.ProdutoID INNER JOIN Produtos_Troca pt ON p.ProdutoID = pt.ProdutoID INNER JOIN Trocas t ON pt.TrocaID = t.TrocaID INNER JOIN Usuarios u ON p.UserID = u.UserID WHERE i.InteressadoID = $UserID AND t.Status != 'Realizada';";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return 'Erro ao enviar interesse: ' . $e;
        }
    }

    public static function interessados($UserID)
    {
        try {
            $conexao = Banco::obterConexao();
            $sql = "SELECT 
    p.ProdutoID, 
    p.Nome AS NomeProduto, 
    p.Descricao, 
    p.Categoria, 
    p.Condicao, 
    p.Imagem, 
    u_interessado.Nome AS NomeInteressado, 
    p_interessado.Nome AS ProdutoInteressado, 
    COALESCE(t.Status, 'Pendente') AS StatusTroca
FROM 
    Produtos p
INNER JOIN 
    Interesses i ON p.ProdutoID = i.ProdutoID
INNER JOIN 
    Usuarios u_interessado ON i.InteressadoID = u_interessado.UserID
LEFT JOIN 
    Produtos p_interessado ON p_interessado.UserID = i.InteressadoID AND p_interessado.Nome = p.Condicao
LEFT JOIN 
    Produtos_Troca pt ON pt.ProdutoID = p.ProdutoID
LEFT JOIN 
    Trocas t ON pt.TrocaID = t.TrocaID
WHERE 
    p.UserID = $UserID AND t.Status != 'Realizada';
";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $e) {
            return 'Erro ao enviar interesse: ' . $e;
        }
    }
}
