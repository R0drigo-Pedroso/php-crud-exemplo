<?php
namespace CrudConversoMoeda;

    abstract class Utilitarios{

        public static function versaoMoeda (float $valor):string {
            return "R$ ". number_format($valor, 2, ",", ".");
        }

        public static function verValor(array $dados){
            echo "<pre>";
                var_dump($dados);
            echo "</pre>";
        }
    }