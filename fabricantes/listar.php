<?php 
    require_once "../src/funcoes-fabricantes.php";
    $listaDeFabricantes = lerFabricantes($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Lista</title>
</head>
<body>
    
    <div class="container">
        <h1>Fabricante | SELECT</h1>
        <hr>

        <h2>Lendo e Carregando todos os fabricantes</h2>

        <p>
            <a href="inserir.php">
                Volta para a pagina de INSERIR
            </a>
        </p>

        <p>
            <a href="../index.php">
                Pagina inicial
            </a>
        </p>

        <!-- Aparecer mensagem para o usuario mostrando o realizamento do processo -->
        <!-- <//?php if (isset ($_GET['status']) && $_GET['status'] == 'atualizado'){ ?>
            <p>
                Fabricantes Atualizado com sucesso!
            </p>
        <//?php } ?> -->
    
        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th colspan="2">Operações</th>
                </tr>
            </thead>

        <tbody>
            <?php    
            foreach ($listaDeFabricantes as $fabricante) {
            ?>
                <tr > 
                    <td><?=$fabricante["id"]?></td>
                    <td><?=$fabricante["nome"]?></td>
                    <td>
                        <a href="atualizar.php?id=<?=$fabricante["id"]?>"> <!-- Criação de link dinamico  -->
                            Atualizar
                        </a>
                    </td>

                    <td>
                        <a class="excluir" href="excluir.php?id=<?=$fabricante["id"]?>">Excluir</a>
                    </td>

                    <!-- Usando o onclick direto no link, realizamos o mesmo efeito para excluir o fabricante
                         <td>
                        <a onclick="return confirm('Deseja excluir?')" href="excluir.php?id=<//?=$fabricante["id"]?>">Excluir</a>
                    </td> -->
                </tr>

            <?php
            }
            ?>
        </tbody>

        </table>
    </div>
    <script type="text/javascript" src="../js/confirm.js"></script>
</body>
</html>
