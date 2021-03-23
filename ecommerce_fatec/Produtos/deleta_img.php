<?php

  
$cod = $_REQUEST["cod"];


include_once "../Funcoes/BancoDeDados.php";


 		$conexao = conectar(); 
        $sql = "select nome_arquivo from imagem where codigo_img='$cod'"; 
        $resultado = $conexao->query($sql);
            foreach ($resultado as $key => $registro) {
                 
                    $nome = $registro["nome_arquivo"];
   					unlink($nome);
        }



        $conexao = conectar();
         $sql = "delete from imagem WHERE codigo_img='$cod';"; 
        $conexao->query($sql);


        header("Location:selecionar_produto.php");
      
    
?>
