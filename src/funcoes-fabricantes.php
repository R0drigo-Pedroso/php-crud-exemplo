<?php
    require_once "conecta.php";

// Leitura de dados dos fabricantes

function lerFabricantes($conexao) {
    // string
    $sql = "SELECT id, nome FROM fabricantes";

    //    Preparação do comando
    $consulta = $conexao -> prepare($sql);

    // Execução do comando
    $consulta -> execute();

    // Captura os resultados
    $resultados = $consulta -> fetchAll(PDO::FETCH_ASSOC);

    return $resultados;
}
