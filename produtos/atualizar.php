<?php

use CrudPoo\Fabricante;
use CrudPoo\Produto;

    require_once "../vendor/autoload.php";

    //Caminho da leiturrae de dados - 
    $fabricante = new Fabricante();
    $listaDeFabricantes = $fabricante->lerFabricantes();
    // final de comentario

    $produto = new Produto();

    $produto->setId($_GET['id']);
   
    // chamando a função e recebendo os dados do Produtos
    $arrayproduto = $produto->lerUmProduto();

    if (isset($_POST['atualizar'])) {

                                        // os paramentro dentro do 'nome' são os mesmos do formulário ou seja, e o name="nome" do formulario
        $produto->setNome ($_POST['nome']);
        $produto->setPreco ($_POST['preco']);
        $produto->setQuantidade ($_POST['quantidade']);
        $produto->setDescricao ($_POST['descricao']);
        $produto->setFabricantesId ($_POST['fabricantes_id']);

        $produto->atualizarProduto();

        header('Refresh:1; url=listar.php');
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Atualizar</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <section class="container inserirProduto">
        <h1>Produtos | SELECT / UPDATE</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$arrayproduto['nome']?>" type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input value="<?=$arrayproduto['preco']?>" type="number" name="preco" id="preco" 
                min="0" max="10000" step="0.01" required>
            </p>    
            <p>
                <label for="quantidade">Quantidade:</label>
                <input value="<?=$arrayproduto['quantidade']?>" type="number" name="quantidade" id="quantidade" 
                min="0" max="100" required>
            </p>    
            <p>
                <label for="fabricante_id">Fabricante:</label>
                <select value="<?=$arrayproduto['id']?>" name="fabricante_id" id="fabricante_id" required>
                    <option value=""></option>

                    <?php foreach($listaDeFabricantes as $arrfabricante){ ?>
                        <option 
                        
                        <?php if ($arrayproduto['fabricantes_id'] == $arrfabricante['id']) echo " selected"; ?>
                        
                        value="<?= $arrfabricante["id"]?>"><?=$arrfabricante["nome"]?></option>
                     <?php 
                    }; ?>

                    <!-- opções de fabricantes existentes no BANCO -->
                </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$arrayproduto['descricao']?>"</textarea>
            </p>
            <button type="submit" name="atualizar">
                Atualizar</button>
        </form>

        <p>
            <a href="listar.php">Voltar para lista de produtos</a>
        </p>
        
            <p>
                <a href="../index.php">Home</a>
            </p>
    </section>
</body>
</html>