<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Funcionário no formulário</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js.map"></script>
    <script src="../js/form-validation.js"></script>
    <script src="../js/script.js"></script>
</head>
<body>
    <style>
        .acoes {
            text-align: center;
        }

        .container {
            margin: 10px;
            padding: 10px;
        }
    </style>
    <script src="assets/js/script.js"></script>
    <!-- Navegação -->
    <header>
        <nav>
            <div class="logo">
                <a href="#">
                    <img src="https://portal.uniasselvi.com.br/public/img/site/logo-horizontal_desk.png" alt="UNIAASELVI">
                </a>
            </div>
            <div class="links">
                <ul class="nav-itens">
                    <li class="nav-item-home">
                        <a href="../../index.php" class="nav-link active" aria-current="page">Home</a>
                    </li>
                    <li class="">
                        <a href="cadastro.html" class="nav-link active">Cadastrar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    

    <!-- Conteúdo Principal -->
    <main class="container">
        <div>
            <!-- Titulo do conteúdo principal -->
            <div>
                <h1>Funcionários cadastrados</h1>
                <p>Lista de funcionários cadastrados no formulário</p>
            </div>
            
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex" role="search" action="consultar.php" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Nome..." aria-label="Search" name="busca">
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                    </form>
                </div>
            </nav>
            
            <?php
                # Pesquisa 
                $pesquisa = $_POST['busca'] ?? '';                

                //  Obtém o arquivo conexao.php que conecta ao banco de dados MySQL
                require_once 'conexao.php';

                //Executa a query/ consulta da variável $sql
                $sql = " SELECT * FROM funcionario WHERE nome LIKE '%$pesquisa%'";
                $resultado = $conexao->query($sql);

                session_unset();

                //  Verifica se a query retornou registros
                if ($resultado->num_rows > 0) {
                    
            ?> 
                    <br />
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <!--<th title="Codigo do funcionário">Codigo</th>-->
                                <th title="Nome do Funcionário">Nome</th>
                                <th title="cargo do Funcionário">Cargo</th>
                                <th title="Descrição do cargo do funcionário">Descrição do Cargo</th>
                                <th title="Setor de trabalho do funcionário">Setor</th>
                                <th title="Salário do funcionário">Salário</th>
                                <th title="Ações de editar ou apagar" colspan="2" class="acoes">Ações</th>
                            </tr>
                            <?php
                            //  Looping pelos registros retornados
                            while($registro = $resultado->fetch_assoc()) {
                                ?>
                                <tr> 
                                    <!--<td> <?php echo $registro["idfuncionario"]; ?> </td>-->
                                    <td> <?php echo $registro["nome"]; ?> </td>
                                    <td> <?php echo $registro["cargo"]; ?> </td>
                                    <td> <?php echo $registro["descricao_do_cargo"]; ?> </td>
                                    <td> <?php echo $registro["setor"]; ?> </td>
                                    <td> <?php echo $registro["salario"]; ?> </td>
                                    <td> <?php echo "<a href='editar.php?id=" . $registro['idfuncionario'] . "' class='btn btn-success btn-sm'>" . "Editar" . "</a>" ;?></td> 
                                    <td> <?php echo "<a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                                    onclick=" .'"' ."pegar_dados($registro[idfuncionario], '$registro[nome]')" .'"' .">Apagar</a>";?></td>
                                </tr>
                            <?php
                            } // fim do loop
                            ?>  

                        <!-- onclick="pegar_dados($id, '$nome')" -->

                        </tbody>
                    </table>

                    
                    <?php
            } else {
                    ?>
                    <?php
                } //    fim do if
            //  fecha a coneão com o MySQL
            $conexao->close();
            ?>

            <!-- Modal -->
            <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="apagar.php">
                            <p>Deseja realmente excluir o cadastro de <b id="nome_pessoa">Nome da pessoa</b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                            <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                            <input type="hidden" name="id" id="cod_pessoa" value="">
                            <input type="submit" class="btn btn-danger" value="Sim">
                    </form>
                </div>
                </div>
            </div>
            </div>

            <script type="text/javascript">
                function pegar_dados(id, nome) {
                    document.getElementById('nome_pessoa').innerHTML = nome;
                    document.getElementById('nome_pessoa_1').innerHTML = nome;
                    document.getElementById('cod_pessoa').value = id;
                }
            </script>

                <br>
                
            <!-- Botão para cadastrar funcionários -->
            <div class="botao_cadastrar">
                <a href="cadastro.html">
                    <p>Cadastrar mais funcionários no formulário ?</p>
                    <button type="button" class="btn btn-primary">
                        Cadastrar Funcionário
                    </button>
                    <!-- * TODO Criar um botão que vai usar javascript para imprimir o formulário em PDF -->
                </a>
            </div>
        </div>
    </main>    
</body>
</html>