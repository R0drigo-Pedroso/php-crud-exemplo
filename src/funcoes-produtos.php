<?php

require_once "conecta.php";


    function lerProdutos(PDO $conexao):array {
        //$sql = "SELECT id, nome, descricao, preco, quantidade, fabricantes_id FROM produtos";

        $sql ="SELECT 
                produtos.id, 
                produtos.nome AS nomeproduto, 
                produtos.descricao, 
                produtos.preco, 
                produtos.quantidade, 
                fabricantes.nome AS nomefabricante
                
                -- --INNER JOIN-- e o caminho para outra tabela, --ON-- e a junção da tabela

                FROM produtos INNER JOIN fabricantes ON produtos.fabricantes_id = fabricantes.id 
                
                ORDER BY produtos.nome";
        

        try {
            $consulta = $conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        } catch(Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }

        return $resultado;
    }
    // Funções utilitárias
    function dump ($dados) {
        echo "<pre>";
        var_dump($dados);
        echo "</pre>";
    }

    // Configuração de moeda

    function formaataMoeda(float $valor):string {
        return "R$ " .number_format($valor, 2, ",", ".");
        
    }