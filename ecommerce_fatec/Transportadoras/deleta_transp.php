<?php

  
$CPF = $_REQUEST["cod"];


include_once "../Funcoes/BancoDeDados.php";
        $conexao = conectar();
        $sql = "delete from transportadora WHERE cpf_cnpj_transp='$CPF';"; 
        $conexao->query($sql);
        header("Location:../Funcionario/employee-menu.html");
      
    
?>
