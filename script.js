function showModal() {
    document.querySelector(".modal-form").style.display = "flex";
}

/*FUNÇÃO DELETAR*/
function deletar(idFuncionario) {
    //pede confirmação ao usuário
    let confirmacao = confirm("Deseja deletar o funcionário?");

    //se confirmar que quer deletar, redireciona para arquivo de ação
    //com o id como parâmetro
    if (confirmacao) {
        window.location = "acaoDeletar.php?id=" + idFuncionario;
    }
}

/*FUNÇÃO EDITAR*/
function editar(idFuncionario) {

    //teste de recebimento
    //alert(idFuncionario);

    let confirmacao = confirm("Deseja editar o funcionário?");

    if (confirmacao) {
        window.location = "editar.php?id=" + idFuncionario;
    }
}

/*BUSCAR FUNCIONARIO POR ID*/
// function buscarFuncionarioPorId(idFuncionario) {

// }

document.getElementById("buttonAdcFuncionario")
    .addEventListener("click", showModal);