<?php

function inserirProduto ($dadosContato)
{
    if(!empty($dadosContato))
    {
        if(!empty($dadosContato['txtId'] && !empty($dadosContato['txtNome']) && !empty($dadosContato['txtPreco']) && !empty($dadosContato['txtDestaque']) && !empty($dadosContato['txtObservacao'])))
        {
            $arrayDados = array(
                "id"      => $dadosContato['txtId'],
                "nome"      => $dadosContato['txtNome'],
                "preco"   => $dadosContato['txtPreco'],
                "destaque"     => $dadosContato['txtDestaque'],
                "observacao"      => $dadosContato['txtObservacao'],
            );

            require_once('modelContato/bd/produto.php');

            if(insertProduto($arrayDados))
                return true;
            else
                return array ('idErro' => 1,
                              'message' => 'Não foi possivel inserir os dados no Banco de Dados');                     
        }
        else
            return array ('idErro' => 2,
                          'message'=> 'Existem campos obrigatório que não foram preechidos');
    }
}

function excluirProduto($id)
{
    if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            require_once('model/bd/contato.php');

            if(deleteContato($id))
                return true;
            else
                return array('idErro'   => 3,
                             'message'  => 'o banco de dados não pode excluír o registro.'
                            );

        }else
        return array('idErro'   => 3,
                     'message'  => 'Não é possível excluír o registro sem informar um id válido.'
                    );
}

function listarProdutos()
{
    require_once('model/bd/produto.php');

    $dados = selectAllProdutos();

    if(!empty($dados))
         return $dados;
    else
        return false;
}


?>