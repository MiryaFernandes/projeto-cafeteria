<?php

require_once('conexaoMysql.php');

function insertCategorias($dadosContato)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblcategoria
                (id,
                categoria)
            values
                ('".$dadosContato['id']."',
                 '".$dadosContato['categoria']."'";

    if(mysqli_query($conexao, $sql))
        {
            if(mysqli_affected_rows($conexao))
            $statusResposta= true;

            else
            $statusResposta= false;
        }
    else
    {
        $statusResposta= false;
    }

    fecharConexaoMysql($conexao);
    return $statusResposta;
    
}

function deleteCategoria($id)
{
    //declaracao de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para deletar um registro no BD
    $sql = "delete from tblcategoria where id=".$id;

    //valida se o script esta correto, sem erro de sintaxe e executa no BD
    if(mysqli_query($conexao, $sql))
    {
        //valida se o BD teve sucesso na execução do script
        if(mysqli_affected_rows($conexao))
            $statusResposta = true;
    } 
    
    //fechar a conexão com o BD mysql
    fecharConexaoMysql($conexao);
    return $statusResposta;
        
}

function selectAllCategorias()
{
    $conexao = conexaoMysql();

    $sql = "select * from tblcategoria order by id desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados [$cont] = array(
                "id"          => $rsDados['id'],
                "categoria"        => $rsDados['categoria'],
                
            );
            $cont++;
        }
        
        fecharConexaoMysql($conexao);

        if(isset($arrayDados)){
            return $arrayDados;
        } else {
            return false;
        }

    }
}

?>