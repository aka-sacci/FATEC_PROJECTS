<?php
const BYTE = 2**3;   
const KBYTE = 2**10; 
const MBYTE = 2**20; 
const GBYTE = 2**30;


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
        $sql = "select codigo_prod from produto where codigo_prod = '$cod'"; 
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
    
        // Testa se já existe registro com o CPF informado. Se já existir, redireciona para o erro_registrado.php, senão registra
        
        if($retorno != "0"){
        header("Location:erro_registro.php?CPF=$cod");
            
        }
        else{
            

        
$diretorioImagem = "../img/produtos/";
            echo "<script>console.log('$diretorioImagem')</script>";
$tamanhomaximo = 10 * MBYTE ;  // DEFINE O TAMANHO MAXIMO 

if (isset($_FILES["arquivo"])){ //se existe o arquivo (a partir do input name arquivo) 
    
    $nomeTemporario = $_FILES["arquivo"]["tmp_name"]; //nome temporário do aqrquivo
    $nomeOriginal = $_FILES["arquivo"]["name"]; //nome do arquivo (maquina)
    $tamanho = $_FILES["arquivo"]["size"]; //tamanho do arquivo         
    $tipo = $_FILES["arquivo"]["type"]; //tipo de arquivo 
    $erro = $_FILES["arquivo"]["error"]; //qual erro deu no arquivo (0 = sem erro)
    
    
    switch ($erro) {
        case 0:
            
             if($tamanho<=$tamanhomaximo){
                 $time = time();  
            $nome_img = $diretorioImagem.$time.$nomeOriginal;
                
        move_uploaded_file($nomeTemporario, $nome_img); 
                 
        $conexao = conectar();
        $sql = "INSERT INTO produto (codigo_prod, nome_pro, descrição, valor_unitario, quantidade, peso, dimensoes, unidade_Venda, id) VALUES ('$cod', '$nome', '$descricao', '$valor', '$estoque', '$peso', '$dimensoes', '$unidade', '$categoria');"; 
        $conexao->query($sql);
                 
        $conexao = conectar();
        
        $sql = "INSERT INTO imagem (codigo_img, codigo_prod, nome_arquivo) VALUES ($time, '$cod', '$nome_img');"; 
        $conexao->query($sql);
        header("Location:../Funcionario/employee-menu.html");
                 
             
             }else{   
                 
            $mensagem = "Arquivo $nomeOriginal possui $tamanho bytes e supera o tamamho máximo permitido de $tamanhomaximo bytes" ;
            header("Location:Erro.php?id=$mensagem");
                 
            }
            
        break;
        case 1:
            $mensagem = "O arquivo enviado excede o limite definido para upload.";
            header("Location:Erro.php?id=$mensagem");
        break;
        case 2:
            $mensagem = "O arquivo enviado excede o limite definido para upload no formuilário HTML.";
            header("Location:Erro.php?id=$mensagem");
            
        break;
        case 3:
            $mensagem = "Arquivo carregado parcialmente";
            header("Location:Erro.php?id=$mensagem");
        break;
        case 4:
            $mensagem = "Nenhum arquivo foi enviado";
            header("Location:Erro.php?id=$mensagem");
        break;
        case 6:
            $mensagem = "Pasta temporária ausente no servidor";
            header("Location:Erro.php?id=$mensagem");
        break;
        case 7:
            $mensagem = "Falha ao escrever no disco";
            header("Location:Erro.php?id=$mensagem");
        break;
        case 8:
            $mensagem = "Processo interrompido por uma das extensões do PHP";
            header("Location:Erro.php?id=$mensagem");
        break;
            
        
    }
    
    
    
   
        
    
    } 
    
        
        }
    

?>
