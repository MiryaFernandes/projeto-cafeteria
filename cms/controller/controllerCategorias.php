<?php

function inserirCategoria ($dadosContato)
{
    if(!empty($dadosContato))
    {
        if(!empty($dadosContato['txtId'] && !empty($dadosContato['txtCategoria'])))
        {
            $arrayDados = array(
                "id"      => $dadosContato['txtId'],
                "categoria"      => $dadosContato['txtCategoria']
            );

            require_once('modelContato/bd/categoria.php');

            if(insertCategorias($arrayDados))
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

function excluirCategoria($id)
{
    if($id != 0 &&  !empty($id) && is_numeric($id))
        {
            require_once('model/bd/categoria.php');

            if(deleteCategoria($id))
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

function listarCategorias()
{
    require_once('model/bd/categoria.php');

    $dados = selectAllCategorias();

    if(!empty($dados))
         return $dados;
    else
        return false;
}


?>