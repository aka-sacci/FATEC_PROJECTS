<?php

  
$CPF = $_REQUEST["cod"];


include_once "../Funcoes/BancoDeDados.php";


 		$conexao = conectar(); 
        $sql = "select nome_arquivo from imagem where codigo_prod='$CPF'"; 
        $resultado = $conexao->query($sql);
            foreach ($resultado as $key => $registro) {
                 
                    $nome = $registro["nome_arquivo"];
   					unlink($nome);
        }



        $conexao = conectar();
         $sql = "delete from imagem WHERE codigo_prod='$CPF';"; 
        $conexao->query($sql);
        $sql = "delete from produto WHERE codigo_prod='$CPF';"; 
        $conexao->query($sql);

        header("Location:../Funcionario/employee-menu.html");
      
    
?>
