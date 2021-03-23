<?php
session_start();
    
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
        $sql = "select cpf_cnpj_cli from cliente where cpf_cnpj_cli = '$CPF'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
        // Testa se já existe registro com o CPF informado. Se já existir, redireciona para o erro_registrado.php, senão registra
        
        if($retorno != "0") header("Location:erro_registro.php?CPF=$CPF");
    
        else{
        
        
    
        $conexao = conectar();
        $sql = "INSERT INTO cliente (cpf_cnpj_cli, nome_cli, numero_cli, bairro_cli, cidade_cli, cep_cli, estado_cli, endereco_cli) VALUES ('$CPF', '$nome', '$telefone', '$bairro', '$cidade', '$CEP', '$UF', '$endereco');"; 
        $conexao->query($sql);
        $vet = array(); 
        $new_insert = array("id" =>$CPF, "nome"=> $nome); 
        array_push($vet, $new_insert); 
        $_SESSION["cliente"] = $vet;                                
        header("Location:cliente_menu.php?cod=$CPF");
        }
    

?>
