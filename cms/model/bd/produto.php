<?php

require_once('conexaoMysql.php');

function insertProduto($dadosContato)
{
    $statusResposta = (boolean) false;

    $conexao = conexaoMysql();

    $sql = "insert into tblproduto
                (id,
                nome, 
                foto,  
                preco,
                destaque,
                observacao)
            values
                ('".$dadosContato['id']."',
                 '".$dadosContato['nome']."',  
                 '".$dadosContato['foto']."', 
                 '".$dadosContato['preco']."',
                 '".$dadosContato['destaque']."',
                 '".$dadosContato['observacao']."'
                );";

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

function deleteProduto($id)
{
    //declaracao de variavel para utilizar no return desta função
    $statusResposta = (boolean) false;

    //abre a conexão com o BD
    $conexao = conexaoMysql();

    //script para deletar um registro no BD
    $sql = "delete from tblprodutos where id=".$id;

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

function selectAllProdutos()
{
    $conexao = conexaoMysql();

    $sql = "select * from tblprodutos order by id desc";

    $result = mysqli_query($conexao, $sql);

    if($result)
    {
        $cont = 0;
        while ($rsDados = mysqli_fetch_assoc($result))
        {
            $arrayDados [$cont] = array(
                "id"          => $rsDados['id'],
                "nome"        => $rsDados['nome'],
                "email"       => $rsDados['foto'],
                "numero"      => $rsDados['preco'],
                "numero"      => $rsDados['destaque'],
                "numero"      => $rsDados['observacao'],
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