<?php

$CPF = $_REQUEST["CPF"];


include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select cpf_cnpj_vend from vendedor where cpf_cnpj_vend = '$CPF'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
        
        
        
        if($retorno != "0") header("Location:employee-menu.html");
    
        else{
        
        header("Location:employee-login.html");
    
        
        }
    

    

?>
