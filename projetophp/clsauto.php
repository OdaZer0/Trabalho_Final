<?php


include "conexao.php";



class Autonomo {
    private $cpf, $nome, $senha, $area, $contato, $email;

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setArea($area){
        $this->area = $area;
    }

    public function getArea(){
        return $this->area;
    }

    public function setContato($contato){
        $this->contato = $contato;
    }

    public function getContato(){
        return $this->contato;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }
}

class AutonomoDAO {
    public function cadastrar(Autonomo $a) {
        
        $bd = new Conexao();
        $con = $bd->getConexao();

        $sql = "INSERT INTO Autonomo (Cpf_autonomo, Nome_autonomo, Senha_autonomo, Area_atuacao_autonomo, Contato_autonomo, Email_autonomo)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $a->getCpf());
        $stmt->bindValue(2, $a->getNome());
        $stmt->bindValue(3, $a->getSenha());
        $stmt->bindValue(4, $a->getArea());
        $stmt->bindValue(5, $a->getContato());
        $stmt->bindValue(6, $a->getEmail());

        return $stmt->execute() ? "Cadastrado com sucesso" : "Erro ao cadastrar";
    }

    public function consultar() {
        $bd = new Conexao();
        $con = $bd->getConexao();

        $sql = "SELECT * FROM Autonomo";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : "Nenhum registro encontrado";
    }

    public function atualizar(Autonomo $a) {
        $bd = new Conexao();
        $con = $bd->getConexao();

        $sql = "UPDATE Autonomo SET Nome_autonomo=?, Senha_autonomo=?, Area_atuacao_autonomo=?, Contato_autonomo=?, Email_autonomo=? WHERE Cpf_autonomo=?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getSenha());
        $stmt->bindValue(3, $a->getArea());
        $stmt->bindValue(4, $a->getContato());
        $stmt->bindValue(5, $a->getEmail());
        $stmt->bindValue(6, $a->getCpf());

        return $stmt->execute() ? "Atualizado com sucesso" : "Erro ao atualizar";
    }

    public function deletar(Autonomo $a) {
        $bd = new Conexao();
        $con = $bd->getConexao();

        $sql = "DELETE FROM Autonomo WHERE Cpf_autonomo=?";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $a->getCpf());

        return $stmt->execute() ? "Deletado com sucesso" : "Erro ao deletar";
    }
}
