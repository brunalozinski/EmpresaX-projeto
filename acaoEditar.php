<?php

    require("./funcoes.php");

    $funcionarioEditado = [
        "id" => $_POST["id"],
        "first_name" => $_POST["first_name"],
        "last_name" => $_POST["last_name"],
        "email" => $_POST["email"],
        "gender" => $_POST["gender"],
        "ip_address" => $_POST["ip_address"],
        "country" => $_POST["country"],
        "department" => $_POST["department"]
    ];

    editarFuncionario('./dados/empresaX.json', $funcionarioEditado);

    header('location: index.php');
