<?php

use CrudConversoMoeda\Utilitarios;
use CrudPoo\Produto;

require_once "../vendor/autoload.php";
    
    $produto = new Produto();
    $listaDeProdutos = $produto->lerProdutos();

    // mostra a moeda convertida
Utilitarios::verValor($listaDeProdutos);

// para pre visualizar no navegador
// dump($listaDeProdutos);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    
    
</head>
<body>
    
    <div class="container">
        <h1>Produtos | SELECT 
            <a href="../index.php">Home</a>
        </h1>

        <hr>

        <h2>Lendo e Carregando todos os produtos</h2>

        <p>
            <a href="inserir.php">Inserir um novo prduto</a>
        </p>

        <div class="produtos p-style">
    
        <?php foreach ($listaDeProdutos as $produto) {?>
            <article>
                <h3>Nome do Produto: <?= $produto["nomeproduto"]?></h3>
                <p>Preço: <?=Utilitarios::versaoMoeda($produto["preco"])?></p>
                <p>Quantidade: <?= $produto["quantidade"]?></p>
                <p>Descrição: <?= $produto["descricao"]?></p>
                <p>Fabricante: <?= $produto["nomefabricante"]?></p>
    
                <p>
                    <a href="atualizar.php?id=<?=$produto["id"]?>">Atualizar</a>
                    <a class="excluir" href="excluir.php?id=<?=$produto["id"]?>">Excluir</a>
                </p>
            </article>
        <?php
        }
        ?>
        </div>

    </div>
    <script type="text/javascript" src="../js/confirm.js"></script>
</body>
</html>
