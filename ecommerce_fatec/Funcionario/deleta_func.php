<?php

  
$CPF = $_REQUEST["cod"];


include_once "../Funcoes/BancoDeDados.php";
        $conexao = conectar();
        $sql = "delete from vendedor WHERE cpf_cnpj_vend='$CPF';"; 
        $conexao->query($sql);
        header("Location:employee-menu.html");
      
    
?>
