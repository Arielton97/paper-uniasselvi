//Função para validar os campos do formulário de cadastro de clientes
var Validar = (()=>{
    let nome = document.getElementById("nome");
    let dt = document.getElementById("dt");
    let cpf = document.getElementById("cpf");
    let formulario = document.getElementById("formulario");

    if(nome.value == ""){
        alert("Informe o nome do cliente");
        nome.focus();
    }else if(dt.value == ""){
        alert("Informe a data de nascimento do cliente");
        dt.focus();
    }else if(cpf.value == ""){
        alert("Informe o CPF do cliente");
        cpf.focus();
    }else{
        formulario.submit();
    }
});