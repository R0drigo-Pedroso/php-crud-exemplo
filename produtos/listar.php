<?php
require_once "../src/funcoes-produtos.php";

$listaDeProdutos = lerProdutos ($conexao);

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
    <link rel="stylesheet" href="../fabricantes/css/esilo.css">
</head>
<body>
    
    <div class="container">
        <h1>Produtos | SELECT 
            <a href="../index.php">Home</a>
        </h1>

        <hr>

        <h2>Lendo e Carregando todos os produtos</h2>

        <p>
            <a href="inserir">Inserir um novo prduto</a>
        </p>

        <div class="produtos p-style">
    
        <?php foreach ($listaDeProdutos as $produto) {?>
            <article>
                <h3>Nome do Produto: <?= $produto["nome"]?></h3>
                <p>Preço: <?= $produto["preco"]?></p>
                <p>Quantidade: <?= $produto["quantidade"]?></p>
                <p>Descrição: <?= $produto["descricao"]?></p>
                <p>Fabricante: <?= $produto["fabricantes_id"]?></p>
    
                <p>
                    <a href="atualizar.php?id=<?=$produto["id"]?>">Atualizar</a>
                    <a href="excluir.php?id=<?=$produto["id"]?>">Excluir</a>
                </p>
            </article>
        <?php
        }
        ?>
        </div>

    </div>
   
   
</body>
</html>