<?php
session_start();
$prod_id = $_REQUEST["produto"];
$qtde = $_REQUEST["qtde"];
$valor = $_REQUEST["valor"];

     if (isset($_SESSION["cliente"])){
            //cliente logado
                    if (isset($_SESSION["carrinho"])){
                    //já tem um carrinho
                    $vet = $_SESSION["carrinho"]; 
                    foreach ($vet as $key => $registro) {
                    $id = $key;
                    $prod = $registro["produto"];

                    if ($prod == $prod_id) {
                    //já tem um produto igual no carrinho
                    unset($vet[$id]); 


                    }
                    
                    }

                    }else{
                    $vet = array(); 


                    }

                    $new_insert = array("produto" =>$prod_id, "qtde"=> $qtde, "valor"=> $valor); 
                    array_push($vet, $new_insert); 
                    $_SESSION["carrinho"] = $vet;
                    header("Location:../cliente/carrinho.php");
                    

            }
            else{


             header("Location:../cliente/client-login.php");

            }



     ?>