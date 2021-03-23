<?php

    
$nome = $_REQUEST["nome"];
$CPF = $_REQUEST["CPF"];


include_once "../Funcoes/BancoDeDados.php";
        $conexao = conectar();
        $sql = "UPDATE vendedor SET nome_vend='$nome' WHERE  cpf_cnpj_vend='$CPF';"; 
        $conexao->query($sql);
        header("Location:employee-menu.html");
      
    
?>
