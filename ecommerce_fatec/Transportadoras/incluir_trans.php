<?php

    
$nome = $_REQUEST["nome"];
$CPF = $_REQUEST["CPF"];
$telefone = $_REQUEST["telefone"];
$UF = $_REQUEST["UF"];
$CEP = $_REQUEST["CEP"];
$cidade = $_REQUEST["cidade"];
$bairro = $_REQUEST["bairro"];
$endereco = $_REQUEST["endereco"];


include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select cpf_cnpj_transp from transportadora where cpf_cnpj_transp = '$CPF'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
        // Testa se já existe registro com o CPF informado. Se já existir, redireciona para o erro_registrado.php, senão registra
        
        if($retorno != "0") header("Location:erro_registro.php?CPF=$CPF");
    
        else{
        
        
    
        $conexao = conectar();
        $sql = "INSERT INTO transportadora (cpf_cnpj_transp, nome_tras, numero_trans, bairro_trans, cidade_trans, cep_trans, estado_trans, endereco_trans) VALUES ('$CPF', '$nome', '$telefone', '$bairro', '$cidade', '$CEP', '$UF', '$endereco');"; 
        $conexao->query($sql);
        header("Location:../Funcionario/employee-menu.html");
        }
    

?>
