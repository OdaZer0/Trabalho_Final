<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header("Content-Type: application/json; charset=UTF-8");

include "clsauto.php";


$autonomo = new Autonomo();
$autonomoDAO = new AutonomoDAO();

$autonomo->setCpf(filter_input(INPUT_POST, 'cpf'));
$autonomo->setNome(filter_input(INPUT_POST, 'nome'));
$autonomo->setSenha(filter_input(INPUT_POST, 'senha'));
$autonomo->setArea(filter_input(INPUT_POST, 'area'));
$autonomo->setContato(filter_input(INPUT_POST, 'contato'));
$autonomo->setEmail(filter_input(INPUT_POST, 'email'));


if (isset($_GET['getPessoa'])) {
    echo json_encode($autonomoDAO->consultar());
} elseif (isset($_GET['cadPessoa'])) {
    echo json_encode($autonomoDAO->cadastrar($autonomo));
} elseif (isset($_GET['delPessoa'])) {
    echo json_encode($autonomoDAO->deletar($autonomo));
} elseif (isset($_GET['atuPessoa'])) {
    echo json_encode($autonomoDAO->atualizar($autonomo));
}
?>
