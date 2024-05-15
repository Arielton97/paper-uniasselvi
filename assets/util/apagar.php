<a href="consultar.php">Voltar</a>

<?php 
    require_once 'conexao.php';    
    if (mysqli_connect_errno()) {         
        echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();         
        exit();     
    }
    $id = $_GET['idfuncionario'];   

    $sql = "DELETE FROM funcionario WHERE idfuncionario = " . mysqli_real_escape_string($conexao, $id);      
    $resultado = mysqli_query($conexao, $sql); 

    if(mysqli_query($conexao, $sql)) {
        $_SESSION['mensagem'] = "Registro apagado com sucesso";
        header('Location: ./consultar.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao apagar o registro!";
        header('consultar.php');
    }
    // FECHAR CONEXÃO 
    mysqli_close($conexao);
?>