<!DOCTYPE>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title> Cadastro </title>
        <link rel="stylesheet" type="text/css" href="../categorias/categorias.css">
        <link rel="stylesheet" href="../categorias/bdCategoria.css">
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
                        <td class="tblColunas destaque"> Categorias </td>
                        <td class="tblColunas destaque"> Id </td>
                        <td class="tblColunas destaque"> ajustes </td>
                    </tr>
                
               <?php
                    //import do arquivo da controller para solicitar a listage, gos dados
                    require_once('controller/controllerCategorias.php');
                    //chama a função que vai retornar od dados de contatos
                    $listCategorias = listarCategorias();
                    
                    //estrutura de repetição para retornsar os dados do array
                    //e printar na tela
                    if($listCategorias){
                    foreach($listCategorias as $item)
                    {
               ?>
                    <tr id="tblLinhas">
                        <td class="tblColunas registros"><?=$item['categoria']?></td>
                        <td class="tblColunas registros"><?=$item['id']?></td>
                    
                        <td class="tblColunas registros">
                            <a href="router.php?component=categorias&action=buscar&id=<?=$item['id']?>">

                            <i class='bx bxs-edit' ></i>Editar<alt="Editar" title="Editar" class="editar">
                            </a>

                                <a onclick="return confirm('Deseja realmente excluir esse item?');" href="router.php?component=contatos&action=deletar&id=<?=$item['id']?>">
                                    <i class='bx bx-trash'></i>Excluir<alt="Excluir" title="Excluir" class="excluir">
                                </a>
                                <i class='bx bx-show'></i>Visualizar<alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>
                    </tr>

                <?php
                    }
                        }
                ?>
            </table>
        </div>


            </nav>
    </p>
        </div>

        
        <script src="../js/categorias.js"></script>
    </body>
</html>