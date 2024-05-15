<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cadastro de Funcionário</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../'assets/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> 
    <style>
        .separar {
            margin-top: 30px;
        }
    </style>
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
                        <a href="consultar.php" class="nav-link active">Voltar</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>   
    <main class="container">
        <div>
            <div>
                <h1>Atualizar Cadastro</h1>
            </div>
            <?php
                require_once 'conexao.php';    
                if (mysqli_connect_errno()) {         
                    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();         
                    exit();     
                }
                $id = $_GET['id'];      
                $sql = "SELECT * FROM funcionario WHERE idfuncionario = " . mysqli_real_escape_string($conexao, $id);      
                $resultado = mysqli_query($conexao, $sql);      
                if (mysqli_num_rows($resultado) > 0) {         
                    $linha = mysqli_fetch_assoc($resultado);          
            ?>  
                <form action="atualizar.php" method="post">
                    <input type="hidden" name="idfuncionario" value="<?php echo $linha['idfuncionario']; ?>">
                    <div>
                        <!-- Nome -->
                        <div class="col-md-6">
                            <label for="nome" class="form-label">
                                <div>
                                    <i class="fa-solid fa-user"></i> Nome
                                    <input type="text" name="nome" class="form-control" value="<?php echo $linha['nome']; ?>" autofocus required>
                                </div>
                            </label>
                        </div>

                        <!-- Cargo OK-->
                        <div class="separar">
                            <label for="cargo">
                                <div>
                                    <i class="fa-solid fa-user-tag"></i> Cargo
                                    <select name="cargo" class="form-select">
                                        <option selected>Selecione o cargo</option>
                                        <option value="Estagiário">Estagiário</option>
                                        <option value="Auxiliar">Auxiliar</option>
                                        <option value="Assistente">Assistente</option>
                                        <option value="Técnico">Técnico</option>
                                        <option value="Trainee">Trainee</option>
                                        <option value="Analista">Analista</option>
                                        <option value="Encarregado">Encarregado</option>
                                        <option value="Coordenador/ Supervisor">Coordenador/ Supervisor</option>
                                        <option value="Gerente">Gerente</option>
                                        <option value="Diretor">Diretor</option>
                                        <option value="Presidente">Presidente</option>
                                    </select>
                                </div>
                            </label>
                        </div>

                        <!-- Descrição do cargo OK-->
                        <div class="separar">
                            <label class="col-md-6" for="descricao_do_cargo">
                                <div>
                                    <i class="fa-solid fa-circle-info"></i> Descrição do cargo
                                    <textarea name="descricao_do_cargo" id="" cols="30" rows="10"><?php echo $linha['descricao_do_cargo']; ?></textarea>
                                </div>
                            </label>
                        </div>

                        <div>
                            <label for="setor">
                                <div>
                                    <i class="fa-solid fa-puzzle-piece"></i> Setor
                                    <select name="setor" class="form-select">
                                        <option selected>Selecione o setor</option>
                                        <option value="Setor Administrativo">Setor Administrativo</option>
                                        <option value="Setor Financeiro">Setor Financeiro</option>
                                        <option value="Setor Comercial">Setor Comercial</option>
                                        <option value="Setor Operacional ou de Produção">Setor Operacional ou de Produção</option>
                                        <option value="Setor de Tecnologias da Informação">Setor de Tecnologias da Informação</option>
                                    </select>
                                </div>
                            </label>
                        </div>

                        <!-- Salário -->
                        <div class="separar">
                            <label for="salario">
                                <i class="fa-solid fa-dollar-sign"></i> Salário
                                <select name="salario">
                                    <option selected>Selecione o salário</option>
                                    <option value="R$ 900,00">R$ 900,00</option>
                                    <option value="R$ 1200,00">Até R$1200</option>
                                    <option value="R$ 1500,00">Até R$ 1500,00</option>
                                    <option value="R$ 2000,00">Até R$ 2000,00</option>
                                    <option value="R$ 2500,00">Até R$ 2500,00</option>
                                    <option value="R$ 3000,00">Até R$ 3000,00</option>
                                    <option value="R$ 3500,00">Até R$ 3500,00</option>
                                    <option value="R$ 4000,00">Até R$ 4000,00</option>
                                    <option value="R$ 5000,00">Até R$ 5000,00</option>
                                    <option value="R$ 6000,00">Até R$ 6000,00</option>
                                    <option value="R$ 7000,00">Acima de R$ 7000,00</option>
                                </select>
                            </label>
                        </div>

                        <br>
                        
                        <!-- Botão para atualizar o formulario -->
                        <div>
                            <button type="submit" name="atualizar" class="btn btn-success">Atualizar</button>
                        </div>
                    </div>
                </form>
            <?php 
            }   else {
                    echo "Nenhum resultado encontrado";     
                }      
                mysqli_close($conexao);
            ?>
        </div>
    </main>
</body>
</html>