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