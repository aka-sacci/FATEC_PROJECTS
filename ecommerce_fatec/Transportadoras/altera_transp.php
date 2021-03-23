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
        $sql = "UPDATE transportadora SET nome_tras='$nome', endereco_trans='$endereco', numero_trans='$telefone',
         bairro_trans='$bairro', cidade_trans='$cidade', estado_trans='$UF', cep_trans='$CEP' WHERE  cpf_cnpj_transp='$CPF';"; 
        $conexao->query($sql);
        header("Location:../Funcionario/employee-menu.html");
        

?>
