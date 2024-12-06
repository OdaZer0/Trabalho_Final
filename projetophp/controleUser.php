<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header("Content-Type: application/json; charset=UTF-8");

include "clsUser.php";

$User = new User();
$UserDAO = new UserDAO();
$User -> setNome(filter_input(INPUT_POST, 'Nome'));
$User -> setEmail(filter_input(INPUT_POST, 'Email'));
$User -> setSenha(filter_input(INPUT_POST, 'Senha'));
$User -> setCep(filter_input(INPUT_POST, 'Cep'));
$User -> setCpf(filter_input(INPUT_POST, 'Cpf'));

if(isset($_GET['getPessoa'])){
    echo json_encode($UserDAO->consultar());
}
elseif(isset($_GET['cadPessoa'])){
    echo json_encode($UserDAO->cadastrar($User));
}
elseif (isset($_GET['delPessoa'])){
    $User -> setCpf(filter_input(INPUT_POST, 'Cpf')); 
    echo json_encode($UserDAO -> deletar($User));
}
elseif (isset($_GET['atuPessoa'])) {

    $User -> setNome(filter_input(INPUT_POST, 'Nome'));
    $User -> setEmail(filter_input(INPUT_POST, 'Email'));
    $User -> setSenha(filter_input(INPUT_POST, 'Senha'));
    $User -> setCep(filter_input(INPUT_POST, 'Cep'));
    $User -> setCpf(filter_input(INPUT_POST, 'Cpf'));

    echo json_encode($UserDAO -> atualizar($User));
}
?> 
