<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Exclusão de Cadastro</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <?php 
                require_once 'conexao.php';    
                if (mysqli_connect_errno()) {         
                    echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();         
                    exit();     
                }

                // para deletar

                $id = $_GET['id'];   

                $sql = "DELETE FROM funcionario WHERE idfuncionario = " . mysqli_real_escape_string($conexao, $id);      
                $resultado = mysqli_query($conexao, $sql); 

                if(mysqli_query($conexao, $sql)) {
                    $_SESSION['mensagem'] = "Cadastro apagado com sucesso!";
                    header('Location: ./consultar.php');
                } else {
                    $_SESSION['mensagem'] = "Erro ao apagar o cadastro!";
                    header('consultar.php');
                }
                // FECHAR CONEXÃO 
                mysqli_close($conexao);
            ?>
            <hr>
            <a href="consultar.php" class="btn-primary">Voltar</a>
        </div>
    </div>



    

</body>
</html>