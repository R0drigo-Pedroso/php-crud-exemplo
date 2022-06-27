<?php

namespace CrudPoo;

/* Indicamos o uso das classes nativas do PHP (ou seja, classes que não fazem parte do nosso namespace) */
use PDO, Exception; 

abstract class Banco {
    /* Propriedade/Atributos de acesso ao servidor de Banco de Dados */

    private static string $servidor = "localhost";
    private static string $usuario = "root";
    private static string $senha = "";
    private static string $banco = "vendas2";
    private static PDO $conexao;

    /* Método de conexão ao servidor de Banco de Dados */
    public static function conectar():PDO {
        try {
            // Self - Permite acessar recursos estaticos da própria classe
            self::$conexao = new PDO(
                "mysql:host=" . self::$servidor . ";
                dbname=" . self::$banco . "; charset=utf8",
                self::$usuario,
                self::$senha
            );
            self::$conexao -> setAttribute(
                PDO::ATTR_ERRMODE, //Constante de erros em geral
                PDO::ERRMODE_EXCEPTION //Constante de erros específicos
            );
        } catch (Exception $erro) {
            die("Erro: " . $erro ->getMessage());
        }
        return self::$conexao;
    }
}
