<?php

    require_once('../src/funcoes-fabricantes.php');

    // Obtendo o valor do parâmentro id
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $nomefabricante = lerUmFabricante($conexao, $id);

    if (isset ($_POST ['atualizar'])) {
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        
        atualizarFabricante($conexao, $id, $nome);

        header('Location: listar.php');
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Atualizar</title>
</head>
<body>
    
    <div class="container">
        <h1>Fabricantes - SELECT/UPDATE</h1>
        <hr>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$id?>">
            <p>
                <label for="nome">Nome:</label>
                <input value="<?=$nomefabricante['nome']?>" type="text" name="nome" id="nome">
            </p>
            <button type="submit" name="atualizar">Atualizar Fabricante</button>
        
        <p>
            <a href="listar.php">
                Voltar para lista de fabricantes
            </a>
        </p>

        <p>
            <a href="../index.php">
                Home
            </a>
        </p>
        </form>
    </div>
</body>
</html>