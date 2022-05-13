<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="../usuarios/bdUsuarios.css">
        <link rel="stylesheet" href="../usuarios/usuarios.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    </head>
    <body>    

        <div class="sidebar">

            <div class="logo_content">                
                <div class="logo">
                    <h3 class="logo-name">
                        grãos de café
                    </h3>
                </div>
                <div class="btn-toggle">
                    <i class='bx bx-menu'></i>
                    <span></span>
                </div>
            </div>

                <ul class="nav">
                    <li>
                        <a href="../cms/produtos.php">
                        <i class='bx bx-list-ul'></i>
                        <span>adm. produtos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../cms/categorias.php">
                        <i class='bx bx-category' ></i>
                        <span>adm. de categorias</span>
                        </a>
                    </li>

                    <li>
                        <a href="../cms/contatos.php">
                        <i class='bx bxs-contact' ></i>
                        <span>contatos</span>
                        </a>
                    </li>

                    <li>
                        <a href="../cms/usuarios.php">
                        <i class='bx bx-user-pin' ></i>
                        <span>usuarios</span>
                        </a>
                    </li>

                    <li>
                        <a href="../cms/login.php">
                        <i class='bx bx-log-out' ></i>
                        <span>log-out</span>
                        </a>
                    </li>
                </ul>
        </div>

        <div class="wrapper">
            <p>        
                <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1> Consulta de Dados.</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Numero </td>
                        <td class="tblColunas destaque"> Email </td>
                    </tr>
                
               <?php
                    //import do arquivo da controller para solicitar a listage, gos dados
                    require_once('controller/controllerCategorias.php');
                    //chama a função que vai retornar od dados de contatos
                    $listContato = listarContato();
                    
                    //estrutura de repetição para retornsar os dados do array
                    //e printar na tela
                    foreach($listContato as $item)
                    {
               ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$item['nome']?></td>
                        <td class="tblColunas registros"><?=$item['numero']?></td>
                        <td class="tblColunas registros"><?=$item['email']?></td>
                    
                        <td class="tblColunas registros">
                            <a href="router.php?component=contatos&action=buscar&id=<?=$item['id']?>">

                                <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                            </a>




                                <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=contatos&action=deletar&id=<?=$item['id']?>">
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>
                    </tr>

                <?php
                    }
                ?>
            </table>
        </div>


            </nav>
                


            
            <nav class="sessao">
                <h1>SESSÃO</h1>
            </nav>

        </main>
    <div id="cadastro"> 
                <div id="cadastroTitulo"> 
                    <h1> Cadastro de Contatos </h1>
                    
                </div>
                <div id="cadastroInformacoes">
                    <form  action="router.php?component=contatos&action=inserir" name="frmCadastro" method="post" >
                        <div class="campos">
                            <div class="cadastroInformacoesPessoais">
                                <label> Nome: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                                <input type="text" name="txtNome" value="<?=$nome?>" placeholder="Digite seu Nome" maxlength="100">
                            </div>
                        </div>
                                        
                        <div class="campos">
                            <div class="cadastroInformacoesPessoais">
                                <label> Telefone: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                                <input type="tel" name="txtTelefone" value="<?=$telefone?>" placeholder="Digite seu Nome">
                            </div>
                        </div> 
                        <div class="campos">
                            <div class="cadastroInformacoesPessoais">
                                <label> Celular: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                                <input type="tel" name="txtCelular" value="<?=$celular?>" placeholder="Digite seu Nome">
                            </div>
                        </div>
                    
                        
                        <div class="campos">
                            <div class="cadastroInformacoesPessoais">
                                <label> Email: </label>
                            </div>
                            <div class="cadastroEntradaDeDados">
                                <input type="email" name="txtEmail" value="<?=$email?>">
                            </div>
                        </div>
                        </div>
                        <div class="enviar">
                            <div class="enviar">
                                <input type="submit" name="btnEnviar" value="Salvar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1> Consulta de Dados.</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Celular </td>
                        <td class="tblColunas destaque"> Email </td>
                        <td class="tblColunas destaque"> Opções </td>
                    </tr>
                    
                <?php
                //import do arquivo da controller para solicitar a listage, gos dados
                        require_once('controller/controllerContatos.php');
                        //chama a função que vai retornar od dados de contatos
                        $listContato = listarContato();
                        
                        //estrutura de repetição para retornsar os dados do array
                        //e printar na tela
                        foreach($listContato as $item)
                        {
                ?>
                        <tr id="tblLinhas">
                            <td class="tblColunas registros"><?=$item['nome']?></td>
                            <td class="tblColunas registros"><?=$item['celular']?></td>
                            <td class="tblColunas registros"><?=$item['email']?></td>
                        
                            <td class="tblColunas registros">
                                <a href="router.php?component=contatos&action=buscar&id=<?=$item['id']?>">

                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar">
                                </a>




                                    <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=contatos&action=deletar&id=<?=$item['id']?>">
                                        <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">
                                    </a>
                                    <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                </table>
            </div>  
</p>
        </div>

        
        <script src="../js/categorias.js"></script>
    </body>
</html>