<?php
    // SCRIPT de CONEXÂO ao servidor bando de dados

    // Abrindo conexão com o servidor - Parâmetros: servidor, usuário, senha, banco de dados
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "vendas2";


    try {
        // Criando conexão com o servidor - MySQL (API/Driver de conexão)
        $conexao = new PDO(
            "mysql:host=$servidor;
            dbname=$banco; charset=utf8",
            $usuario,
            $senha
        );

        // Habilita a verificação de erros
        $conexao -> setAttribute(
            PDO::ATTR_ERRMODE, //Constante de erros em geral
            PDO::ERRMODE_EXCEPTION //Constante de erros específicos
        ); 
    } catch (Exception $erro){
        die("Erro: " .$erro ->getMessage());
    }

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
        </table>

        <tbody>

            <?php
               $sql = "SELECT id, nome FROM fabricantes";

            //    Preparação do comando
            $consulta = $conexao -> prepare($sql);

            // Execução do comando
            $consulta -> execute();

            // Captura os resultados
            $resultados = $consulta -> fetchAll(PDO::FETCH_ASSOC);

            echo "<pre>";
            var_dump($resultados);
            echo "</pre>";
            ?>

        </tbody>

    </div>

</body>
</html>