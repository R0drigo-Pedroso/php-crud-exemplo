<?php
namespace CrudPoo;

use PDO, Exception;

Final class Fabricante {
    private int $id;
    private string $nome;

    /* Esta propriedade receberá os recursos PDO através da classe Banco (dependencia do projeto) */
    private PDO $conexao;

    public function __construct() {
        /* no momento em que for criado um objeto a partir da classe Fabricante, automaticamente será feita a conexão com o banco */
        $this->conexao = Banco::conectar();
    }

    // lerFabricantes é um método que retorna um array de fabricantes
    public function lerFabricantes():array {
        // string
        $sql = "SELECT id, nome FROM fabricantes";
            
            try {
                //    Preparação do comando
                $consulta = $this->conexao -> prepare($sql);

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
    public function inserirFabricante():void {
        $sql = "INSERT INTO Fabricantes (nome) VALUES (:nome)"; // :qualquer_coisa - named parameters
    
        try {
            $consulta = $this->conexao -> prepare($sql);
            
             /* bindParam ('nome do paramentro', $variavel_com_valor, COnstante de verificação) */
            $consulta -> bindParam(':nome', $this->nome, PDO::PARAM_STR); // PDO::PARAM_STR - string 
            $consulta -> execute();
    
        } catch (Exception $erro) {
            die ("Erro: " .$erro -> getMessage());
        }
    }
    //Final inserirFabricante




    
    
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;

    }
}