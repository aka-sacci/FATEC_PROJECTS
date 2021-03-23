<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
    include_once "../Funcoes/BancoDeDados.php"; 

        $cod = $_REQUEST["cod"];
        $produtos = array();
        $conexao = conectar(); 
        $sql = "select possui.codigo_prod, possui.valor, possui.quantidade, compra.`data`, compra.valor_transporte,
transportadora.nome_tras, transportadora.cpf_cnpj_transp, vendedor.nome_vend, produto.nome_pro, 
produto.valor_unitario, imagem.nome_arquivo, cliente.nome_cli, cliente.cpf_cnpj_cli, cliente.cep_cli,
cliente.estado_cli, cliente.cidade_cli, cliente.endereco_cli, transportadora.estado_trans
from possui 
inner join compra on possui.numero_compra = compra.numero_compra
inner join vendedor on compra.cpf_cnpj_vend = vendedor.cpf_cnpj_vend
inner join produto on possui.codigo_prod =  produto.codigo_prod
inner join imagem on produto.codigo_prod = imagem.codigo_prod 
inner join transportadora on compra.cpf_cnpj_transp = transportadora.cpf_cnpj_transp
inner join cliente on compra.cpf_cnpj_cli = cliente.cpf_cnpj_cli
where compra.numero_compra = '$cod'
group by possui.codigo_prod;"; 

        $resultado = $conexao->query($sql);
        foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $nome_cli = $registro["nome_cli"];
                    $cpf_cli = $registro["cpf_cnpj_cli"];
                    $cep_cli = $registro["cep_cli"];
                    $uf_cli = $registro["estado_cli"];
                    $cidade_cli = $registro["cidade_cli"];
                    $endereco_cli = $registro["endereco_cli"];
                    $uf_transportadora = $registro["estado_trans"];
                    $transportadora = $registro["nome_tras"];
                    $cod_transportadora = $registro["cpf_cnpj_transp"];
                    $preco_transp = $registro["valor_transporte"];
                    $data_compra = $registro["data"];
                    $prod_id = $registro["codigo_prod"];
                    $qtde = $registro["quantidade"];
                    $valor_un = $registro["valor_unitario"];
                    $nome_prod = $registro["nome_pro"];
                    $valor_total = $registro["valor"];
                    $img = $registro["nome_arquivo"];
                    $vendedor = $registro["nome_vend"];
                    $data_brasil = date('d/m/Y', strtotime($data_compra));


                    $new_insert = array("produto" =>$prod_id, "qtde"=> $qtde, "valor_un"=> $valor_un, 
                      "nome"=>$nome_prod, "valor_total"=> $valor_total, "imagem"=> $img); 
                    array_push($produtos, $new_insert); 
         
                  }

                 


     ?>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="../img/fevicon.png" type="image/png" />
    <title>Canui - Compra</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../vendors/linericon/style.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/themify-icons.css" />
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="../vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/responsive.css" />
  </head>

  <body>
    <!--================Header Menu Area =================-->
    <header class="header_area">
    <div class="top_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <div class="float-left">
              <p>Telefone: (11) 4597-1620</p>
              <p>email: contato@canui.com</p>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="float-right">
              <ul class="right_side">
                <li>
                  <a href="tracking.html">
                    Acompanhe Pedidos
                  </a>
                </li>
                <li>
                  <a href="../contact.html">
                    Contate-nos
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light w-100">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="../index.php">
            <img src="../img/logo.png" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
            <div class="row w-100 mr-0">
              <div class="col-lg-7 pr-0">
                <ul class="nav navbar-nav center_nav pull-right">
                  <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../Shop/category.php">Fazer Compras</a>
                  </li>
            
                  <li class="nav-item">
                    <a class="nav-link" href="../sobre.html">Sobre nós</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../contact.html">Contato</a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-5 pr-0">
                <ul class="nav navbar-nav navbar-right right_nav pull-right">
                  <li class="nav-item">
                    <a href="../cliente/carrinho.php" class="icons">
                      <i class="ti-shopping-cart"></i>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="../cliente/client-login.php" class="icons">
                      <i class="ti-user" aria-hidden="true"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </header>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="banner_area">
      <div class="banner_inner d-flex align-items-center">
        <div class="container">

          <div
            class="banner_content d-md-flex justify-content-between align-items-center"
          >
            <div class="mb-3 mb-md-0">
              <h2>Carrinho de compras</h2>
              <p></p>
              
            </div>
            <div class="page_link">
              <a href="../index.html">Home</a>
              <a href="cliente_menu.php?cod=<?php echo $cpf_cli;  ?> ">Área do cliente</a>
              <a href="historico_cliente.php?CPF=<?php echo $cpf_cli;  ?> ">Histórico de compras</a>
              <a href="#">Detalhe da compra</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="">
      <div class="container">
       

              <div class="section-top-border">
        <h3 class="mb-30 title_color">Dados de entrega</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="single-defination">
              <h4 class="mb-20">Detalhes do destinatário</h4>
              <p>Nome: <?php echo $nome_cli; ?><br>
                CPF/CNPJ: <?php echo $cpf_cli; ?><br>
                CEP: <?php echo $cep_cli; ?><br>
                UF: <?php echo $uf_cli; ?><br>
                Cidade: <?php echo $cidade_cli; ?><br>
                Endereço: <?php echo $endereco_cli; ?><br>
                Data do pedido: <?php echo $data_brasil; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single-defination">
              <h4 class="mb-20">Detalhes do transportador</h4>
              <p>Nome: <?php echo $transportadora; ?><br>
              CPF/CNPJ: <?php echo $cod_transportadora; ?> <br>
              UF: <?php echo $uf_transportadora; ?> <br>
              
                   Valor de entrega: R$ <?php echo $preco_transp; ?></p>
  

                 
            </div>
          </div>
          <div class="col-md-4">
            <div class="single-defination">
              <h4 class="mb-20">Vendedor</h4>
              <p>Responsável: <?php echo $vendedor; ?></p>
              
            
                   
            </div>
          </div>
        </div>
      </div>
          
        
          <div class="row">
            <div class="col-lg-8">
              

  <div class="section-top-border">
        <h3 class="mb-30 title_color">Detalhes da encomenda</h3>
        <div class="progress-table-wrap">
          <div class="progress-table">
            <div class="table-head">
              <div class="serial">#</div>
              <div class="country">Produto</div>
              <div class="country">Nome</div>
              <div class="visit">Qtde</div>
              <div class="visit">UN</div>
              <div class="visit">Total</div>
               

              
            </div>
            

                  <?php 
             
            
            if (isset($produtos)){
              $cont = 1;
              $subtotal = 0;
                    foreach ($produtos as $key => $registro) {
                    $id = $key;
                    $CPF = $registro["produto"];
                    $nome = $registro["nome"];
                    $valor = $registro["valor_un"];
                    $qtde = $registro["qtde"];
                    $imagem = $registro["imagem"];
                    $v_total = $registro["valor_total"];
                    $subtotal += $v_total;
                    echo "
              <div class='table-row'>
              <div class='serial'>$cont</div>
              <div class='country'>
                <a href='../shop/single-product.php?produto=$CPF'><img src='$imagem' width='70' height='70' alt='flag'></a></div>
              <div class='country'>
                $nome</div>
              <div class='visit'>$qtde</div>
              <div class='visit'>R$ $valor</div>
              <div class='visit'>R$ $v_total</div>
              </div>";
              $cont = $cont + 1;
                  }

                  
            }else{
            }   
        $preco_fim = $subtotal+$preco_transp;
       echo "<p align='right'>Preço Total: R$ $preco_fim</p>"; 
        
     ?>
<a class='genric-btn info' href="../Arquivos/Abrir_arquivo.php?cod=<?php echo $cod; ?>">Ver pseudo-comprovante</a> 
         
      </div>


            </div>

          </div>
       
        <br>
       

            
            
              </div></div></div>

    </section>
    <!--================End Checkout Area =================-->

    <!--================ start footer Area  =================-->
    <footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Top Produtos</h4>
          <ul>
            <li><a href="../Shop/category.php">Camisetas</a></li>
            <li><a href="../Shop/category.php">Calças</a></li>
            <li><a href="../Shop/category.php">Casacos</a></li>
            <li><a href="../Shop/category.php">Meias</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4>Links Rápidos</h4>
          <ul>
            <li><a href="../sobre.html">Sobre nós</a></li>
            <li><a href="../contact.html">Contato</a></li>
            <li><a href="../Funcionario/employee-login.html">Área do funcionário</a></li>
            <li><a href="https://www.ecommercebrasil.com.br/artigos/a-elaboracao-do-seu-termo-de-uso-online/#:~:text=Startups%20de%20tecnologia%20e%20sites,servi%C3%A7o%20que%20est%C3%A1%20sendo%20oferecido.">Termos de Serviço</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          
        </div>
        <div class="col-lg-2 col-md-6 single-footer-widget">
          <h4></h4>
          
        </div>
        <div class="col-lg-4 col-md-6 single-footer-widget">
          <h4>Novidades</h4>
          <p>Você pode confiar em nós. enviamos apenas ofertas promocionais.</p>
          <div class="form-wrap" id="mc_embed_signup">
            <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
              method="get" class="form-inline">
              <input class="form-control" name="EMAIL" placeholder="Seu endereço de Email" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Your Email Address '" required="" type="email">
              <button class="click-btn btn btn-default">Inscreva-se</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

              <div class="info"></div>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"></p>
        <div class="col-lg-4 col-md-12 footer-social">
          <a href="https://www.facebook.com/vitor.am.reis/"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-behance"></i></a>
        </div>
      </div>
    </div>
  </footer>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>
