<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header("Content-Type: application/json; charset=UTF-8");

include "Clsempresa.php";


$Empresa = new Empresa();
$EmpresaDAO = new EmpresaDAO();

$Empresa->setCNPJ(filter_input(INPUT_POST, 'Cnpj'));
$Empresa->setNome(filter_input(INPUT_POST, 'Nome'));
$Empresa->setEmail(filter_input(INPUT_POST, 'Email'));
$Empresa->setSenha(filter_input(INPUT_POST, 'Senha'));
$Empresa->setCep(filter_input(INPUT_POST, 'Cep'));
$Empresa->setContato(filter_input(INPUT_POST, 'Contato'));


if (isset($_GET['getPessoa'])) {
    echo json_encode($EmpresaDAO->consultar());
} elseif (isset($_GET['cadPessoa'])) {
    echo json_encode($EmpresaDAO->cadastrar($Empresa));
} elseif (isset($_GET['delPessoa'])) {
    echo json_encode($EmpresaDAO->deletar($Empresa));
} elseif (isset($_GET['atuPessoa'])) {
    if (isset($_GET['cnpj'])) {
        
        $CNPJ = $_GET['cnpj'];
        echo json_encode($EmpresaDAO->consultarPorCNPJ($CNPJ));  
    } else {
        echo json_encode($EmpresaDAO->atualizar($Empresa));  
    }
}

