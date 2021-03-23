<?php
session_start();
include_once "../Funcoes/BancoDeDados.php"; 
require_once '../vendor/autoload.php';
$transp = $_REQUEST["transp"];
$vend = $_REQUEST["vendedor"];
$val_total = $_REQUEST["valor_final"];
$val_transp = $_REQUEST["preco_transp"];
$total_sem_transp = $val_total - $val_transp;
$percentagem_comissao = 0.10;
$comissao = $total_sem_transp*$percentagem_comissao;
$validade = 1;


			$produtos = $_SESSION["carrinho"];
      $produtos_check = $_SESSION["carrinho"];

        foreach ($produtos_check as $key => $registro) {
                    $id_check = $key;
                    $prod_check = $registro["produto"]; 
                    $q_check = $registro["qtde"];  
                    $valor_uni_check = $registro["valor"]; 

                    $conexao = conectar(); 
                    $sql = "select quantidade, nome_pro from produto where codigo_prod = $prod_check"; 
                    $resultado = $conexao->query($sql);

                    foreach ($resultado as $key_consul => $registro_consul) {
                    $id_consul = $key_consul;
                    $qtde_consul = $registro_consul["quantidade"];
                    $nome_consul = $registro_consul["nome_pro"];
                    $qtde_final = $qtde_consul - $q_check;  

                    if ($qtde_final < 0 ) {
                               $validade = 0;
                               header("Location:erro_produto.php?nome=$nome_consul&cod=$prod_check");

                              }          
                      }



                  } 

        $cliente = $_SESSION["cliente"];

            foreach ($cliente as $key => $registro) {
                    $id = $key;
                    $name = $registro["nome"];
                    $cd_cli = $registro["id"];

            }


if ($validade == 1){
              $conexao = conectar(); 
              $cod_compra = time();
              $sql = "INSERT INTO compra (numero_compra, data, valor_comissao, valor_transporte, cpf_cnpj_vend, cpf_cnpj_transp, cpf_cnpj_cli) VALUES ('$cod_compra', now(), '$comissao', '$val_transp', '$vend', '$transp', '$cd_cli');"; 
               $resultado = $conexao->query($sql);


              foreach ($produtos as $key => $registro) {
                    $id = $key;
                    $prod = $registro["produto"]; 
                    $q = $registro["qtde"];  
                    $valor_unit = $registro["valor"]; 
                    $valor_total_produto = $valor_unit*$q;

                    $conexao = conectar(); 
                    $sql = "INSERT INTO possui (numero_compra, codigo_prod, valor, quantidade) VALUES ('$cod_compra', '$prod', '$valor_total_produto', '$q');"; 
                    $resultado = $conexao->query($sql);

                    $conexao = conectar(); 
                    $sql = "UPDATE produto SET quantidade=quantidade-$q WHERE codigo_prod='$prod';"; 
                    $resultado = $conexao->query($sql);

                  

                  }
                  unset($_SESSION["carrinho"]);
            $DIR = "../arquivos/DANFE/";
            $ARQ = "$cod_compra.pdf";
            $FINAL = $DIR.$ARQ;
             $DATE = date("d/m/Y");
            $hora = date("H:i:s", strtotime('-5hour'));
            $html = "
<fieldset>
<p style='font-size: 8px;'>CANUI CLOTHING LTDA - AV. MATHIAS LOPES, 126 - CENTRO - NAZARÉ PAULISTA-SP - 12960-000 - (11) 4597-3011</p>
<h1>Comprovante de Compra</h1>
<p class='center sub-titulo'>
Nº <strong>$cod_compra</strong> -
VALOR <strong>R$ $val_total.00</strong>
</p>
<p> Data de emissão: $DATE às $hora </p>
<p>Comprador: $name</p>
<p>CPFJ/CNPJ: $cd_cli</p>
</fieldset>
";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output($FINAL, "f");


            header("Location:conclusao_compra.php?CPF=$cd_cli&compra=$cod_compra");

            }else{



            }
     

?>