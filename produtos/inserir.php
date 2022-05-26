<?php 
    require_once "../src/funcoes-produtos.php";

    $listaDeProdutos = lerProdutos ($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>
</head>
<body>
    <div class="container">
        <h1>Produtos | INSERT</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" 
                min="0" max="10000" step="0.01" required>
            </p>    
            <p>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" 
                min="0" max="100" required>
            </p>    
            <p>
                <label for="fabricante">Fabricante:</label>
                <select name="fabricante" id="fabricante" required>
                    <option value=""></option>

                    <?php foreach($fabricantes as $fabricante){ ?>
                        <option value=""></option>
                     <?php }; ?>

                    <!-- opções de fabricantes existentes no BANCO -->
                </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea required name="descricao" id="descricao" cols="30" rows="3"></textarea>
            </p>
            <button type="submit" name="inserir">
                Inserir produto</button>
        </form>

        <p>
            <a href="listar.php">Voltar para lista de produtos</a>
        </p>
        
            <p>
                <a href="../index.php">Home</a>
            </p>
    </div>
</body>
</html>