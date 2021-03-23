<?php
session_start();
$cod = $_REQUEST["cod"];
   $vet = $_SESSION["carrinho"];
   $size = count($vet); 

   if ($size == "1") {
   
   header("Location:exclui_carrinho.php"); 
   }
   else
   {


        foreach ($vet as $key => $registro) {
                    $id = $key;
                    $prod = $registro["produto"];

                    if ($prod == $cod) {
                    //já tem um produto igual no carrinho
                    unset($vet[$id]); 
                    

                    }
                    
                    }
            $_SESSION["carrinho"] = $vet;
            header("Location:carrinho.php"); 



   }

            
            


?>