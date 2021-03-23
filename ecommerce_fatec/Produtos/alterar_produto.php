<?php
$nome = $_REQUEST["nome"];
$cod = $_REQUEST["cod"];
$descricao = $_REQUEST["descricao"];
$valor = $_REQUEST["valor"];
$estoque = $_REQUEST["estoque"];
$peso = $_REQUEST["peso"];
$categoria = $_REQUEST["categoria"];
$dimensoes = $_REQUEST["dimensoes"];
$unidade = $_REQUEST["unidade"];

include_once "../Funcoes/BancoDeDados.php";

 $conexao = conectar();
        $sql = "UPDATE produto SET nome_pro='$nome', descrição='$descricao', valor_unitario='$valor', quantidade='$estoque', peso='$peso', dimensoes='$dimensoes', unidade_Venda='$unidade', id='$categoria' WHERE  codigo_prod='$cod';"; 
        $conexao->query($sql);
                 
 
        header("Location:../Funcionario/employee-menu.html");





  ?>