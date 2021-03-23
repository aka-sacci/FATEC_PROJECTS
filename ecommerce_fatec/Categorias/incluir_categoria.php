<?php

    
$nome = $_REQUEST["nome"];



include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select nome from categoria where nome = '$nome'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
        // Testa se já existe registro com o CPF informado. Se já existir, redireciona para o erro_registrado.php, senão registra
        
        if($retorno != "0") header("Location:erro_registro.php?nome=$nome");
    
        else{
        
        
    
        $conexao = conectar();
        $sql = "INSERT INTO categoria (nome) VALUES ('$nome');"; 
        $conexao->query($sql);
        header("Location:../Funcionario/employee-menu.html");
        }
    

?>
