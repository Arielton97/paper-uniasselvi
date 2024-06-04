<?php
    session_start();
    require_once 'conexao.php';    

    if(isset($_POST['atualizar'])) {

        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $cargo = mysqli_real_escape_string($conexao, $_POST['cargo']);
        $descricaoDoCargo = mysqli_real_escape_string($conexao, $_POST['descricao_do_cargo']);
        $setor = mysqli_real_escape_string($conexao, $_POST['setor']);
        $salario = mysqli_real_escape_string($conexao, $_POST['salario']);

        $id = mysqli_real_escape_string($conexao, $_POST['idfuncionario']);

        $sql = "UPDATE funcionario SET nome = '$nome', 
                                    cargo = '$cargo', 
                                    descricao_do_cargo = '$descricaoDoCargo', 
                                    setor = '$setor', 
                                    salario = '$salario'   
                                    WHERE idfuncionario = '$id'";

        if(mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Registro editado com sucesso";
            header('Location: ./consultar.php');
        } else {
            $_SESSION['message'] = "Erro na edição do registro!";
            header('consultar.php');
        }
        // FECHAR CONEXÃO 
        mysqli_close($conexao);
    }
?>