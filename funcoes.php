<?php

function lerArquivo($nomeArquivo) {
    $arquivo = file_get_contents($nomeArquivo);

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario ($funcionarios, $filtro) {

    $funcionariosFiltro = [];

    foreach($funcionarios as $funcionario) {

        if(
            strpos($funcionario -> first_name,  $filtro) !== false
            ||
            strpos($funcionario -> last_name,  $filtro) !== false
            ||
            strpos($funcionario -> department,  $filtro) !== false
        ){
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}

function adicionarFuncionarios ($nomeArquivo, $novoFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}

function deletarFuncionario($nomeArquivo, $idFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario) {
        if($funcionario->id == $idFuncionario) {
            unset($funcionarios[$chave]);
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);

}

function buscarFuncionarioPorId($nomeArquivo, $idFuncionario) {
    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $funcionario) {
        if ($funcionario->id == $idFuncionario) {
            return $funcionario;
        }
    }
    return false;
}

function editarFuncionario($nomeArquivo, $funcionarioEditado){

    $funcionarios = lerArquivo($nomeArquivo);

    foreach($funcionarios as $chave => $funcionario){
        if ($funcionario->id == $funcionarioEditado["id"]){
            $funcionarios[$chave] = $funcionarioEditado;
        }
    }

    $json = json_encode(array_values($funcionarios));

    file_put_contents($nomeArquivo, $json);
}


//1 - usuario vindo do form
//2 - senha vindo do form
//3 - dados do arquivo json de usuario e senha

function realizarLogin($usuario, $senha, $dados){

    foreach ($dados as $dado){

        if ($dado->usuario == $usuario && $dado->senha == $senha) {
            
            //VARIAVEIS DE SESSÃO: 
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: index.php');
            exit;
        }
        
    }

    header('location: login.php');

}

//FUNÇÃO DE VALIDAÇÃO DE LOGIN:
//VERIFICA SE O USUARIO PASSOU PELO PROCESSO DE LOGIN

function verificarLogin(){

    if($_SESSION["id"] != session_id() || (empty($_SESSION["id"])) ){

        header("location: login.php");
    }

}

function finalizarLogin(){
    session_unset(); // LIMPA TODAS AS VARIAVEIS DA SESSÃO
    session_destroy(); // DESTROI A SESSÃO ATIVA

    header('location: login.php');
}