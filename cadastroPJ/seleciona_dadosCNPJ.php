<?php

    include "./conexao.php";

    $flag = 0;

    $query = "SELECT * FROM dadosCnpj WHERE id = {$_GET['id']}";

    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        foreach ($resultado as $linha) {
            foreach ($linha as $key => $elemento) {
                $$key = $elemento;
            }
        }

    }

?>
