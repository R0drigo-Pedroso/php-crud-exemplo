<?php 
   require_once "../src/funcoes-produtos.php";
   require_once "../src/funcoes-fabricantes.php";

//    listaDeFabricantes que ser usado dentro do foreach
    $listaDeFabricantes = lerFabricantes($conexao);
   
    // para pre visualizar no navegador e sanitizando (segurança)
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    // chamando a função e recebendo os dados do Produtos
    $produto = lerUmProduto($conexao, $id);

    if (isset($_POST['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
        $usado = filter_input(INPUT_POST, 'usado', FILTER_SANITIZE_NUMBER_INT);
        $fabricante_id = filter_input(INPUT_POST, 'fabricante_id', FILTER_SANITIZE_NUMBER_INT);

        lerUmProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado, $fabricante_id);

        echo "<script>alert('Produto atualizado com sucesso!');</script>";
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
    <div class="container inserirProduto">
        <h1>Produtos | SELECT / UPDATE</h1>
        <hr>
        <form action="" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
            </p>
            <p>
                <label for="preco">Preço:</label>
                <input value="<?=$produto['preco']?>" type="number" name="preco" id="preco" 
                min="0" max="10000" step="0.01" required>
            </p>    
            <p>
                <label for="quantidade">Quantidade:</label>
                <input value="<?=$produto['quantidade']?>" type="number" name="quantidade" id="quantidade" 
                min="0" max="100" required>
            </p>    
            <p>
                <label for="fabricante_id">Fabricante:</label>
                <select value="<?=$produto['id']?>" name="fabricante_id" id="fabricante_id" required>
                    <option value=""></option>

                    <?php foreach($listaDeFabricantes as $fabricante){ ?>
                        <option 
                        
                        <?php if ($produto['fabricantes_id'] == $fabricante['id']) echo " selected"; ?>
                        
                        value="<?= $fabricante["id"]?>"><?=$fabricante["nome"]?></option>
                     <?php 
                    }; ?>

                    <!-- opções de fabricantes existentes no BANCO -->
                </select>
            </p>
            <p>
                <label for="descricao">Descrição:</label> <br>
                <textarea required name="descricao" id="descricao" cols="30" rows="3"><?=$produto['descricao']?>"</textarea>
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
    </div>
</body>
</html>