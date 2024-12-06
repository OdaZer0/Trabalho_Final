<?php
include "conexao.php";

class User{
    private $Nome, $Email, $Senha, $CEP, $CPF;
    public function setNome($Nome){
        $this -> Nome = $Nome;
    }
    public function getNome(){
        return $this-> Nome;
    }
    public function setEmail($Email){
        $this -> Email = $Email;
    }
    public function getEmail(){
        return $this-> Email;
    }
    public function setSenha($Senha){
        $this -> Senha = $Senha;
    }
    public function getSenha(){
        return $this-> Senha;
    }
    public function setCep($Cep){
        $this -> CEP = $Cep;
    }
    public function getCep(){
        return $this-> CEP;
    }
    public function setCpf($CPF){
        $this -> CPF = $CPF;
    }
    public function getCpf(){
        return $this-> CPF;
    }

}
class UserDAO{

    public function cadastrar(User $a) {

        $bd = new Conexao();
        $con = $bd->getConexao();
    
        $sql = "INSERT INTO Usuario (Nome_usuario, Email_usuario, Senha_usuario, Cep_usuario, Cpf_usuario)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
    
        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getEmail());
        $stmt->bindValue(3, $a->getSenha());
        $stmt->bindValue(4, $a->getCep());
        $stmt->bindValue(5, $a->getCpf());
    
        if ($stmt->execute()) {
            return "Cadastrado com sucesso";
        } else {
            return "Erro ao cadastrar: " . implode(", ", $stmt->errorInfo());
        }
    }
    
    public function consultar(){
        $bd = new Conexao();
        $con = $bd -> getConexao();
        $sql = "SELECT * FROM Usuario";
        $stmt = $con->prepare($sql);
        $stmt -> execute();
        return $stmt ->rowCount()> 0 ? $stmt -> fetchAll (PDO::FETCH_ASSOC) : "Nenhum registro encontrado";
    }
    public function atualizar(User $a){
        $bd = new Conexao();
        $con = $bd -> getConexao();
        $sql = "UPDATE Usuario SET Nome_usuario =?, Email_usuario=?,Senha_usuario=?,Cep_usuario = ? WHERE Cpf_usuario =?" ;
        $stmt = $con->prepare($sql);

        $stmt->bindValue(1, $a->getNome());
        $stmt->bindValue(2, $a->getEmail());
        $stmt->bindValue(3, $a->getSenha());
        $stmt->bindValue(4, $a->getCep());
        $stmt->bindValue(5, $a->getCpf());
        return $stmt->execute() ? "dados atualizados com sucesso" : "Erro ao atualizar";
    }
    public function deletar(User $a){
        $bd = new Conexao;
        $con = $bd-> getConexao();
        $sql = "DELETE FROM Usuario Where Cpf_usuario=?";
        $stmt = $con -> prepare($sql);
        $stmt-> bindValue(1, $a->getCpf());
        return $stmt->execute() ? "Deletado com sucesso" : "Erro ao deletar";
    }
}
   
