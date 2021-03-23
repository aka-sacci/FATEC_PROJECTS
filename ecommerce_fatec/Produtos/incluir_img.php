<?php
const BYTE = 2**3;   
const KBYTE = 2**10; 
const MBYTE = 2**20; 
const GBYTE = 2**30;



$cod = $_REQUEST["cod"];




include_once "../Funcoes/BancoDeDados.php";
    
     
    
            

        
$diretorioImagem = "../img/produtos/";
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
                 
            $nome_img = $diretorioImagem.time().$nomeOriginal;
                
        move_uploaded_file($nomeTemporario, $nome_img); 

                 
        $conexao = conectar();
        $time = time();
        $sql = "INSERT INTO imagem (codigo_img, codigo_prod, nome_arquivo) VALUES ($time, '$cod', '$nome_img');"; 
        $conexao->query($sql);
        header("Location:selecionar_produto.php");
                 
             
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
    
        
        
    

?>
