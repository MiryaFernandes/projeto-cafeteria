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

 function conexaoMysql(){
    $conexao = array();

    //se a conexao for estabelecida com o BD, iremos ter um array de dados sobre a conexao
    $conexao = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //Validação para verificar se a conexão foi realizada com sucesso
    if($conexao){
        return $conexao;
    }else{
        return false;
    }
}

//fecha a conexão do BD no MySql
function fecharConexaoMySql($conexao){

    mysqli_close($conexao);

};

?>