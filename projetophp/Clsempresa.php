<?php
include "conexao.php";

class Empresa{
    private $CNPJ, $Nome, $Email, $Senha, $Cep, $Contato;
    
    public function setCNPJ($CNPJ){
        $this -> CNPJ = $CNPJ;
    }
    public function getCNPJ(){
        return $this -> CNPJ;
    }
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
        $this -> Cep = $Cep;
    }
    public function getCep(){
        return $this-> Cep;
    }
    public function setContato($Contato){
        $this -> Contato = $Contato;
    }
    public function getContato(){
        return $this-> Contato;
    }
}
class EmpresaDAO{

    public function cadastrar(Empresa $a) {
        
        $bd = new Conexao();
        $con = $bd->getConexao();
    
        $sql = "INSERT INTO Empresa (Cnpj_empresa, Nome_empresa, Email_empresa, Senha_empresa, Cep_empresa, Contato_empresa)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
    
        $stmt->bindValue(1, $a->getCNPJ());
        $stmt->bindValue(2, $a->getNome());
        $stmt->bindValue(3, $a->getEmail());
        $stmt->bindValue(4, $a->getSenha());
        $stmt->bindValue(5, $a->getCep());
        $stmt->bindValue(6, $a->getContato());
    
        if ($stmt->execute()) {
            return "Cadastrado com sucesso";
        } else {
            return "Erro ao cadastrar: " . implode(", ", $stmt->errorInfo());
        }
    }
        public function consultar(){
            $bd = new Conexao();
            $con = $bd->getConexao();
            $sql = "SELECT * FROM Empresa"; 
            $stmt = $con->prepare($sql);
            $stmt->execute();
            return $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : "Nenhum registro encontrado";
        }
        
    
        public function atualizar(Empresa $a) {
            $bd = new Conexao();
            $con = $bd->getConexao();
            $sql = 'UPDATE Empresa SET 
                    Nome_empresa=?, 
                    Email_empresa=?, 
                    Senha_empresa=?, 
                    Cep_empresa=?, 
                    Contato_empresa=? 
                    WHERE Cnpj_empresa=?'; 
            $stmt = $con->prepare($sql);
        
          
            $stmt->bindValue(1, $a->getNome());
            $stmt->bindValue(2, $a->getEmail());
            $stmt->bindValue(3, $a->getSenha());
            $stmt->bindValue(4, $a->getCep());
            $stmt->bindValue(5, $a->getContato());
            $stmt->bindValue(6, $a->getCNPJ()); 
        
            return $stmt->execute() ? "dados atualizados com sucesso" : "Erro ao atualizar";
        }
        
        
        public function deletar(Empresa $a) {
            $bd = new Conexao();
            $con = $bd->getConexao();
            
            
            $sql = "DELETE FROM Empresa WHERE Cnpj_empresa=?";
            
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $a->getCNPJ());  
            
            return $stmt->execute() ? "Deletado com sucesso" : "Erro ao deletar";
        }
        public function consultarPorCNPJ($CNPJ) {
            $bd = new Conexao();
            $con = $bd->getConexao();
            $sql = "SELECT * FROM Empresa WHERE Cnpj_empresa = ?";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $CNPJ);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);  
        }
        }

        
        