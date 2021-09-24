<?php

require("./funcoes.php");

$funcionarios = lerArquivo ("./dados/empresaX.json");

if(isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

session_start();
require_once('./funcoes.php');

verificarLogin();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Empresa X</title>
</head>
<body>
    <main>

    <h1>Funcionários da empresa X</h1>

    <p class="text-align" style="text-align: center">
      A empresa conta com <em> <?= count($funcionarios) ?> </em> funcionários.
    </p>

    <?php echo 'Olá ' . strtoupper($_SESSION['usuario']) . ' - Login efetutado em: ' .$_SESSION['data_hora']; ?>

    <a class="material-icons" href="processa_login.php?logout=true">logout</a>

    <form method="GET" class="search-form">

      <div class="input-group" style="flex: 1">

        <!-- <label>Pesquisar por nome</label> -->

        <input type="search" placeholder="Buscar Funcionário" name="filtro" 
          value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />

      </div>

      <button class="material-icons">
      <span class="material-icons">search</span></button>
      
    </form>

    <!-- <button id="buttonAdcFuncionario">Adicionar Funcionário</button> -->

    <br /> <br />

    <div id="buttonAdcFuncionario">
        <p>+</p>
    </div>

    <div id="container_modal">
        <div id="bg"></div>
        <div class="modal-form">


      <form id="form-funcionario" action="acoes.php" method="POST">

        <h1>Adicionar funcionário</h1>
        <input type="text" placeholder="Digite o id" name="id" />
        <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
        <input type="text" placeholder="Digite o sobrenome" name="last_name" />
        <input type="text" placeholder="Digite o e-mail" name="email" />

        <select name="gender" id="gender" required placeholder="Sexo">
          <option value="" selected disabled>Selecione</option>
          <option value="Male">Masculino</option>
          <option value="Female">Feminino</option>
        </select>

        <input type="text" placeholder="Digite o IP" name="ip_address" />
        <input type="text" placeholder="Digite o país" name="country" />
        <input type="text" placeholder="Digite o departamento" name="department" />

        <button>Salvar</button>
      </form>

    </div>

    <table border="13">

        <tr>
            <th>Id</th>
            <th>Nome</th>  
            <th>Sobrenome</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Endereço IP</th>
            <th>País</th>
            <th>Departamento</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>

        <?php
        foreach($funcionarios as $funcionario) :
        ?>

        <tr>
            <td><?= $funcionario->id ?></td>
            <td><?= $funcionario->first_name ?></td>
            <td><?= $funcionario->last_name ?></td>
            <td><?= $funcionario->email ?></td>
            <td><?= $funcionario->gender ?></td>
            <td><?= $funcionario->ip_address ?></td>
            <td><?= $funcionario->country ?></td>
            <td><?= $funcionario->department ?></td>

           
            <td><button class="material-icons" onclick="editar(<?= $funcionario->id ?>)">
              <span class="material-icons">edit</span>
            </button></td>

            <td><button class="material-icons" onclick="deletar(<?= $funcionario->id ?>)">
              <span class="material-icons">clear</span>
            </button></td>
        </tr>
        
        <?php
        endforeach
        ?>

    </table>
    </main>

</body>
</html>