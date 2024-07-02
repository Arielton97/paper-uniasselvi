<?php

    //Variáveis para conexão com o banco de dados
    $host = "localhost";
    $usuario = "root";
    $senha = "";  //Defina a senha do seu banco de dados
    $banco = "uniasselvi";

    //Variável de conexão com o banco de dados
    $conexao = mysqli_connect($host, 
                        $usuario, 
                        $senha, 
                        $banco) 
    or die("Erro na conexão com o Banco de Dados: " . mysqli_error($conexao));
?>