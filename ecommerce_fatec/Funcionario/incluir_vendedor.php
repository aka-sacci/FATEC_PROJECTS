<?php

    
$nome = $_REQUEST["nome"];
$CPF = $_REQUEST["CPF"];


include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select cpf_cnpj_vend from vendedor where cpf_cnpj_vend = '$CPF'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
        // Testa se já existe registro com o CPF informado. Se já existir, redireciona para o erro_registrado.php, senão registra
        
        if($retorno != "0") header("Location:erro_registro.php?CPF=$CPF");
    
        else{
        
        
    
        $conexao = conectar();
        $sql = "INSERT INTO vendedor (cpf_cnpj_vend, nome_vend) VALUES ('$CPF', '$nome');"; 
        $conexao->query($sql);
        header("Location:employee-menu.html");
        }
    
?>
