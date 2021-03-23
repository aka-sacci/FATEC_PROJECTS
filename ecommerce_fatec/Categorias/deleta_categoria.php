<?php

  
$CPF = $_REQUEST["cod"];


include_once "../Funcoes/BancoDeDados.php";
        $conexao = conectar();
        $sql = "delete from categoria WHERE id='$CPF';"; 
        $conexao->query($sql);
        header("Location:../funcionario/employee-menu.html");
      
    
?>
