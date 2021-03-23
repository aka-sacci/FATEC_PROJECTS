<?php
session_start();

$CPF = $_REQUEST["CPF"];


include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select cpf_cnpj_cli, nome_cli from cliente where cpf_cnpj_cli = '$CPF'"; 
        $resultado = $conexao->query($sql);
      	foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $nome = $registro["nome_cli"];  
                     

                  }


        $retorno = isset($nome);
        
        
        
        
        if($retorno != false) {

        	
 				

                    
				$vet = array(); 
				$new_insert = array("id" =>$CPF, "nome"=> $nome); 
				array_push($vet, $new_insert); 
				$_SESSION["cliente"] = $vet; //atualiza o array da sessão
				//echo var_dump($pessoas);
				header("Location:cliente_menu.php?cod=$CPF");
        	
        }
    
        else{
        
        header("Location:client-login.php");
    
        
        }
    

    

?>
