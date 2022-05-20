<?php
    require_once "conecta.php";

// Leitura de dados dos fabricantes
function lerFabricantes(PDO $conexao):array {
         // string
         $sql = "SELECT id, nome FROM fabricantes";
             
    try {
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
function inserirFabricante (PDO $conexao, string $nome):void {
    $sql = "INSERT INTO Fabricantes (nome) VALUES (:nome)"; // :qualquer_coisa - named parameters

    try {
        $consulta = $conexao -> prepare($sql);
        
         /* bindParam ('nome do paramentro', $variavel_com_valor, COnstante de verificação) */
        $consulta -> bindParam(':nome', $nome, PDO::PARAM_STR); // PDO::PARAM_STR - string 
        $consulta -> execute();

    } catch (Exception $erro) {
        die ("Erro: " .$erro -> getMessage());
    }
}


// Atualizar um Fabricante
function lerUmFabricante(PDO $conexao, int $id):array {
    $sql = "SELECT id, nome FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> bindParam(':id', $id, PDO::PARAM_INT);
        $consulta -> execute();

        $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);

    }catch (PDOException $erro){
        die ("Erro: " .$erro -> getMessage());
    }

    return $resultado;
}


// Atualizar um Fabricante UPDATE
function atualizarFabricante(PDO $conexao, int $id, string $nome):void {
    $sql = "UPDATE fabricantes SET nome = :nome WHERE id = :id";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> bindParam(':nome', $nome, PDO::PARAM_STR);
        $consulta -> bindParam(':id', $id, PDO::PARAM_INT);
        $consulta -> execute();
    } catch (PDOException $erro) {
        die ("Erro: " .$erro -> getMessage());
    }
}

// Excluir um Fabricante
function excluirFabricante(PDO $conexao, int $id):void {
    $sql = "DELETE FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao -> prepare($sql);
        $consulta -> bindParam(':id', $id, PDO::PARAM_INT);
        $consulta -> execute();
    } catch (Exception $erro) {
        die ("Erro: " .$erro -> getMessage());
    }

}