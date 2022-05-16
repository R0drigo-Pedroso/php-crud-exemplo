<?php
    require_once "conecta.php";

// Leitura de dados dos fabricantes

function lerFabricantes(PDO $conexao):array {
        try {
            // string
        $sql = "SELECT id, nome FROM fabricantes";

        //    Preparação do comando
        $consulta = $conexao -> prepare($sql);

        // Execução do comando
        $consulta -> execute();

        // Captura os resultados
        $resultados = $consulta -> fetchAll(PDO::FETCH_ASSOC);    
    } catch (Exception $erro) {
        die ("Erro na consulta ao banco de dados: " .$erro -> getMessage());
    }

    return $resultados;
}


// Inserir um Fabricante

function inserirFabricante (PDO $conexao, string $nome):array {
    
}