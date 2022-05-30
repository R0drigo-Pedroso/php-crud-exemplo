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
