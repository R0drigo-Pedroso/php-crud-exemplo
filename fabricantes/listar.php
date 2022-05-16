<?php require_once "../src/conecta.php";

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


        <table>
            <caption>Lista de Fabricantes</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>

        <tbody>
            <?php
               $sql = "SELECT id, nome FROM fabricantes";

            //    Preparação do comando
            $consulta = $conexao -> prepare($sql);

            // Execução do comando
            $consulta -> execute();

            // Captura os resultados
            $resultados = $consulta -> fetchAll(PDO::FETCH_ASSOC);

            // echo "<pre>";
            // var_dump($resultados);
            // echo "</pre>";
    
            foreach ($resultados as $fabricante) {
            ?>
                <tr > 
                    <td><?=$fabricante["id"]?></td>
                    <td><?=$fabricante["nome"]?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>

        </table>
    </div>

</body>
</html>