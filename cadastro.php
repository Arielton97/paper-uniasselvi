<?php 
    include("./conexao.php");

    $nome = $_POST['nome'];
    $cargo = $_POST["cargo"];
    $descricaoDoCargo = $_POST["descricaodocargo"];
    $setor = $_POST["setor"];
    $salario = $_POST["salario"];


    $sql = "INSERT INTO funcionário (nome, cargo, descricaocargo, setor, salario) VALUES ('$nome', '$cargo', '$descricaoDoCargo', '$setor', '$salario')";
    if (mysqli_query($conexao, $sql)) {
        echo "Usuário cadastrado com sucesso!";
        // redirecionar a página para outro link
    } else {
        echo "Usuário não cadastrado!";
        // redirecionar a página para fazer o cadastro
    }

?> 