<?php

require("./funcoes.php");

$idFuncionario = $_GET["id"];

deletarFuncionario("./dados/empresaX.json", $idFuncionario);

header("location: index.php");