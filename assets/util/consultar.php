<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Funcionário no formulário</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../../assets/css/style.css">
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
            
            <?php
                //  Obtém a lista de hábitos do banco de dados MySQL
                require_once 'conexao.php';

                //Executa a query/ consulta da variável $sql
                $sql = " SELECT * FROM funcionario";
                $resultado = $conexao->query($sql);

                session_unset();

                //  Verifica se a query retornou registros
                if ($resultado->num_rows > 0) {
                    
            ?>
                    <br />
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th title="Codigo do funcionário">Codigo</th>
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
                                    <td> <?php echo $registro["idfuncionario"]; ?> </td>
                                    <td> <?php echo $registro["nome"]; ?> </td>
                                    <td> <?php echo $registro["cargo"]; ?> </td>
                                    <td> <?php echo $registro["descricao_do_cargo"]; ?> </td>
                                    <td> <?php echo $registro["setor"]; ?> </td>
                                    <td> <?php echo $registro["salario"]; ?> </td>
                                    <td> <?php echo "<a href='editar.php?id=" . $registro['idfuncionario'] . "'>" . "Editar" . "</a>" ;?></td> 
                                    <td> <?php echo "<a href='apagar.php?id=" . $registro['idfuncionario'] . "'>" . "Apagar" . "</a>" ;?></td>
                                </tr>
                            <?php
                            } // fim do looping
                            ?>  
                        </tbody>
                    </table>

                    
                    <?php
            } else {
                    ?>
                    <p>Frase do dia</p>
                    <p>Quem não tem coragem de arriscar, não chega a lugar nenhum</p>
                    <?php
                } //    fim do if
            //  fecha a coneão com o MySQL
            $conexao->close();
            ?>

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