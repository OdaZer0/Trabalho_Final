<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header("Content-Type: application/json; charset=UTF-8");

include "clsprod.php";

$Produto = new Produto();
$ProdutoDAO = new ProdutoDAO();


if (isset($_GET['getProduto'])) {
  
    echo json_encode($ProdutoDAO->consultar());
} elseif (isset($_GET['cadProduto'])) {

    $Produto->setNome(filter_input(INPUT_POST, 'Nome'));
    $Produto->setPreco(filter_input(INPUT_POST, 'Preco'));
    $Produto->setDescricao(filter_input(INPUT_POST, 'Descricao'));
    $Produto->setQuantidade(filter_input(INPUT_POST, 'Quantidade'));

    echo json_encode($ProdutoDAO->cadastrar($Produto));
} elseif (isset($_GET['delProduto'])) {
    
    $Produto->setId(filter_input(INPUT_POST, 'idprod')); 
    echo json_encode($ProdutoDAO->deletar($Produto));
} elseif (isset($_GET['atuProduto'])) {
   
    $Produto->setId(filter_input(INPUT_POST, 'Id'));  

 
    $Produto->setNome(filter_input(INPUT_POST, 'Nome'));
    $Produto->setPreco(filter_input(INPUT_POST, 'Preco'));
    $Produto->setDescricao(filter_input(INPUT_POST, 'Descricao'));
    $Produto->setQuantidade(filter_input(INPUT_POST, 'Quantidade'));
   
    echo json_encode($ProdutoDAO->atualizar($Produto));
}

?>
