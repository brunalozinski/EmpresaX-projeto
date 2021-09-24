<?php

//INICIALIZA A SESSÃO PARA O PROCESSO DE LOGIN
session_start();

require("./funcoes.php");

//RECEBENDO OS DADOS DO FORMULARIO
if(isset($_POST["txt_usuario"]) || isset($_POST["txt_senha"])){

    $usuario = $_POST["txt_usuario"];
    $senha = $_POST["txt_senha"];

realizarLogin($usuario, $senha, lerArquivo("dados/usuarios.json"));

} else if($_GET["logout"]){

    finalizarLogin();
    
}
