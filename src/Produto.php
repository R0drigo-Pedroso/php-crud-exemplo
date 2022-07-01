<?php
namespace CrudPoo;

use PDO, Exception;

final class Produto {
        private int $id;
        private string $nome;
        private float $preco;
        private int $quantidade;
        private string $descricao;
        private int $fabricantes_id;
    
    private PDO $conexao;

    public function __construct() {
        $this->conexao = Banco::conectar();
    }

    // Função para inserir produtos
    public function lerProdutos():array {
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
            $consulta = $this->conexao->prepare($sql);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

        } catch(Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }

        return $resultado;
    }



    // Inserir dados no banco de dados - INSERT produtos
    public function inserirProduto():void { // void indica sem retorno
        $sql = "INSERT INTO produtos (nome, preco, quantidade, descricao, fabricantes_id) VALUES (:nome, :preco, :quantidade, :descricao, :fabricantes_id)";  

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":nome", $this->nome, PDO::PARAM_STR);
            $consulta->bindParam(":preco", $this->preco, PDO::PARAM_STR);
            $consulta->bindParam(":quantidade", $this->quantidade, PDO::PARAM_INT);
            $consulta->bindParam(":descricao", $this->descricao, PDO::PARAM_STR);
            $consulta->bindParam(":fabricantes_id", $this->fabricantes_id, PDO::PARAM_INT);

            $consulta->execute();
            
        } catch (Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }
    }

    // Atualizar Produto
    public function atualizarProduto():void {
    $sql = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, fabricantes_id = :fabricante_id WHERE id = :id";

    try {
        $consulta = $this->conexao->prepare($sql);
        $consulta->bindParam(':id', $this->id, PDO::PARAM_INT);
        $consulta->bindParam(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $this->preco, PDO::PARAM_STR);
        $consulta->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);
        $consulta->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
        $consulta->bindParam(':fabricante_id', $this->fabricantes_id, PDO::PARAM_INT);
        
        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro: ". $erro->getMessage());
    }
}

// Atualizar dados no banco de dados - UPDATE produtos
public function lerUmProduto():array {
        $sql = "SELECT id, nome, preco, quantidade, descricao, fabricantes_id FROM produtos WHERE id = :id";

        try {
            $consulta = $this->conexao->prepare($sql);
            $consulta->bindParam(":id", $this->id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        } catch(Exception $erro) {
            die("Erro: " .$erro->getMessage());
        }

        return $resultado;
    }


    // Excluir um Fabricante
    public function excluirProduto():void {
        $sql = "DELETE FROM produtos WHERE id = :id";
    
        try {
            $consulta = $this->conexao -> prepare($sql);
            $consulta -> bindParam(':id', $this->id, PDO::PARAM_INT);
            $consulta -> execute();
        } catch (Exception $erro) {
            die ("Erro: " .$erro -> getMessage());
        }
    
    }


    // Setters e Getters - Atribuir valores aos atributos
        public function getId(): int
        {
                return $this->id;
        }

       
        public function setId(int $id)
        {
                $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
        }

       
        public function getNome(): string
        {
                return $this->nome;
        }

    
        public function setNome(string $nome)
        {
                $this->nome = filter_var($nome, FILTER_SANITIZE_SPECIAL_CHARS);

        }

     
        public function getPreco(): float
        {
                return $this->preco;
        }

     
        public function setPreco(float $preco)
        {
                $this->preco = filter_var($preco, FILTER_SANITIZE_NUMBER_FLOAT);
        }

        
        public function getQuantidade(): int
        {
                return $this->quantidade;
        }

   
        public function setQuantidade(int $quantidade)
        {
                $this->quantidade = filter_var($quantidade, FILTER_SANITIZE_NUMBER_INT);

        }

      
        public function getDescricao(): string
        {
                return $this->descricao;
        }

  
        public function setDescricao(string $descricao)
        {
                $this->descricao = filter_var($descricao, FILTER_SANITIZE_SPECIAL_CHARS);
        }


        public function getFabricantesId(): int
        {
                return $this->fabricantes_id;
        }

 
        public function setFabricantesId(int $fabricantes_id)
        {
                $this->fabricantes_id = filter_var($fabricantes_id, FILTER_SANITIZE_NUMBER_INT);

         }
}

