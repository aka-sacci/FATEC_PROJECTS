<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function exibe_erro(object $erro,$mensagem){
    switch ($erro->getCode()){
            case 23000: 
                echo $mensagem;
                echo "Código do erro: " ,$erro->getCode(),"<br>";
                echo "Mensagem original: ", $erro->getMessage(),"<br>";
            break;
        }
        
        echo "<a href='javascript:history.go(-1)'>Voltar</a>";
        return;
}
