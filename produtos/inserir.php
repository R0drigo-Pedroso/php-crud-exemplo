<?php

    use CrudPoo\{Fabricante, Produto};

        require_once "../vendor/autoload.php";

        $fabricante = new Fabricante();
        $produto = new Produto();

        $listaDeFabricantes = $fabricante->lerFabricantes();

   if(isset($_POST['inserir'])){
    $produto->setNome($_POST['nome']);
    
    $produto->setPreco($_POST['preco']);

    $produto->setQuantidade($_POST['quantidade']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setFabricantesId ($_POST['fabricante_id']);

    $produto->inserirProduto();

    header("location:listar.php");
   }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserir</title>

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <div class="inserirProduto">
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
                <label for="fabricante_id">Fabricante:</label>
                <select name="fabricante_id" id="fabricante_id" required>
                    <option value=""></option>

                    <?php foreach($listaDeFabricantes as $fabricante){ ?>
                        <option value="<?= $fabricante["id"]?>"><?=$fabricante["nome"]?></option>
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