<?php
include "conexao.php";

class Produto {
    private $id, $nome, $preco, $descricao, $quantidade;

    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    
    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getPreco() {
        return $this->preco;
    }

    
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }


    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }
}

class ProdutoDAO {
    private $con;

    public function __construct() {
        
        $bd = new Conexao();
        $this->con = $bd->getConexao();
    }

    
    public function cadastrar(Produto $produto) {
        try {
            $sql = "INSERT INTO Produtos (Nome_produto, Preco_produto, Descricao_produto, Quantidade_produto) 
                    VALUES (?, ?, ?, ?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getPreco());
            $stmt->bindValue(3, $produto->getDescricao());
            $stmt->bindValue(4, $produto->getQuantidade());

            return $stmt->execute() ? "Produto cadastrado com sucesso!" : "Erro ao cadastrar produto.";
        } catch (PDOException $e) {
            return "Erro ao cadastrar produto: " . $e->getMessage();
        }
    }


    public function consultar($nome = null) {
        try {
            if ($nome) {
                $sql = "SELECT * FROM Produtos WHERE Nome_produto LIKE ?";
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(1, '%' . $nome . '%');
            } else {
                $sql = "SELECT * FROM Produtos";
                $stmt = $this->con->prepare($sql);
            }

            $stmt->execute();
            return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : "Nenhum produto encontrado.";
        } catch (PDOException $e) {
            return "Erro ao consultar produtos: " . $e->getMessage();
        }
    }

    public function atualizar(Produto $produto) {
        try {
            $sql = "UPDATE Produtos SET Nome_produto = ?, Preco_produto = ?, Descricao_produto = ?, Quantidade_produto = ? 
                    WHERE Id_produto = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $produto->getNome());
            $stmt->bindValue(2, $produto->getPreco());
            $stmt->bindValue(3, $produto->getDescricao());
            $stmt->bindValue(4, $produto->getQuantidade());
            $stmt->bindValue(5, $produto->getId());
    
            return $stmt->execute() ? "Produto atualizado com sucesso!" : "Erro ao atualizar produto.";
        } catch (PDOException $e) {
            return "Erro ao atualizar produto: " . $e->getMessage();
        }
    }
    
    public function deletar(Produto $produto) {
        try {
            $sql = "DELETE FROM Produtos WHERE Id_produto = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $produto->getId());

            return $stmt->execute() ? "Produto deletado com sucesso!" : "Erro ao deletar produto.";
        } catch (PDOException $e) {
            return "Erro ao deletar produto: " . $e->getMessage();
        }
    }
}
?>
