<?php 

require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

excluirFabricante($conexao, $id);

header('Location: listar.php');

if (isset ($_POST ['exluir'])) {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    
    atualizarFabricante($conexao, $id, $nome);

    //header('Location: listar.php');
    
       //header('Refresh:1; url=listar.php');

    // header('Location: listar.php?status=atualizado');
}