<?php

/********************************************************
 * objetivo: criar conexaao com o bd msql
 * autora: miryã elizabeth
 * data: 05/04/22 
 * versão: 1.0
 *  
 */

 
 const SERVER = 'localhost';
 const USER = 'ROOT'; 
 const PASSWORD = 'bcd127';
 const DATABASE = 'contatos';

 $resultado = conexaoMysql();

 function conexaoMysql()
 {
    $conexao = array();

    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    
    if($conexao)
        return $conexao
    else
        return false;

    }

    function fecharConexaoMysql($conexao)
    {
        mysqli_close($conexao);
    }

?>