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
        $sql = "UPDATE cliente SET nome_cli='$nome', endereco_cli='$endereco', numero_cli='$telefone',
         bairro_cli='$bairro', cidade_cli='$cidade', estado_cli='$UF', cep_cli='$CEP' WHERE  cpf_cnpj_cli='$CPF';"; 
        $conexao->query($sql);
        $vet = $_SESSION["cliente"]; 
        unset($vet[0]);
        $new_insert = array("nome" =>$nome, "id"=> $CPF); 
        array_push($vet, $new_insert); 
        $_SESSION["cliente"] = $vet;

        header("Location:cliente_menu.php?cod=$CPF");
        

?>
