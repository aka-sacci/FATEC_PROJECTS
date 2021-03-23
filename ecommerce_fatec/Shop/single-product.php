<!DOCTYPE html>
<html lang="en">
<?php

include_once "../Funcoes/BancoDeDados.php";
    
    $produto = $_REQUEST["produto"];
    $sql = "select * from produto inner join categoria on produto.id = categoria.id where codigo_prod = '$produto'"; 
    $conexao = conectar(); 
    $resultado = $conexao->query($sql);
    foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $CPF = $registro["codigo_prod"];
                    $nome = $registro["nome_pro"];
                    $desc = $registro["descrição"];
                    $valor = $registro["valor_unitario"];
                    $qtde = $registro["quantidade"];
                    $peso = $registro["peso"];
                    $dimensoes = $registro["dimensoes"];
                    $un = $registro["unidade_Venda"];
                    $categoria = $registro["nome"];
                   
                    
                    }
        

  ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="../img/fevicon.png" type="image/png" />
    <title>Canui - Shop</title>
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
              <h2>Detalhes do produto</h2>
             
            </div>
            <div class="page_link">
              <a href="../index.html">Home</a>
              <a href="single-product.php">Detalhes do produto</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Single Product Area =================-->
    <div class="product_image_area">
      <div class="container">     
        <div class="row s_product_inner">


<?php
  
    $sql = "select * from imagem where codigo_prod='$produto' order by codigo_img asc"; 
    $conexao = conectar(); 
    $resultado = $conexao->query($sql);
   
?>



          <div class="col-lg-6">
            <div class="s_product_img">
              <div
                id="carouselExampleIndicators"
                class="carousel slide"
                data-ride="carousel"
              >
                <ol class="carousel-indicators">
                  

                <?php
                    
                   foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $caminho = $registro["nome_arquivo"];
                    
                    

                    echo " <li
                    data-target='#carouselExampleIndicators'
                    data-slide-to='$id'
                    class='active'
                  >
                    <img
                      src='$caminho'
                      alt=''
                       width='60' height='60'
                    />
                  </li>";

              
                    
                    }

                  ?>

                 
    
                </ol>


                <div class="carousel-inner">
        
                  <?php
                   $sql = "select * from imagem where codigo_prod='$produto' order by codigo_img asc"; 
                   $conexao = conectar(); 
                   $resultado = $conexao->query($sql);
                    
                   foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $caminho = $registro["nome_arquivo"];
                    if ($id == "0") {
                      echo "  
                 <div class='carousel-item active'>
                    <img
                      class='d-block w-100'
                      src='$caminho'
                      alt='First slide'
                    />
                  </div>
                ";
                    }else{

                       echo "  
                 <div class='carousel-item'>
                    <img
                      class='d-block w-100'
                      src='$caminho'
                      alt=''
                    />
                  </div>
                ";


                    }
                    

                   

              
                    
                    }

                  ?>

              
                  
          
                </div>
              </div>
            </div>
          </div>



          <div class="col-lg-5 offset-lg-1">
            <div class="s_product_text">
              <h3><?php echo "$nome";  ?></h3>
              <h2>R$ <?php echo "$valor";  ?></h2>
              <ul class="list">
                <li>
                  <a class="active" href="#">
                    <span>Categoria:</span> <?php echo "$categoria";  ?></a
                  >
                </li>
                <li>
                  <a href="#"> <span>Estoque: </span>  <?php echo "$qtde";  ?></a>
                </li>
              </ul>
              <p>
                <?php echo "$desc";  ?>
              </p>
              <form
               action="adicionar_carrinho.php"
                method="get">
              <div class="product_count">
                <label for="qty">Quantidade:</label>
                <input
                  type="number"
                  min="1"
                  max="<?php echo "$qtde"; ?>"
                  name="qtde"
                  id="sst"
                  maxlength="12"
                  value="1"
                  title="Quantity:"
                  class="input-text qty"
                />
              
              </div>
               <input
                    type="hidden"
                    name="produto"
                    placeholder="Código de barras do produto"
                    <?php   echo "value='$CPF'";?>
                    readonly
                  />
                    <input
                    type="hidden"
                    name="valor"
                    placeholder="Código de barras do produto"
                    <?php   echo "value='$valor'";?>
                    readonly
                  />
              <div class="card_area">
                <?php 
                  if ($qtde > 0 ) {
                   echo "<button class='main_btn' type='submit'>Adicionar ao Carrinho</button>";
                  }else{


                     echo "<button class='genric-btn danger' type='submit' disabled>Sem estoque!</button>";
                  }

                 ?>

                
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
      <div class="container">
        
    
         
            <h4>Especificações</h4>
         
   
        
      <div
            class="tab-pane"
            id="profile"
            role="tabpanel"
            aria-labelledby="profile-tab"
          >
            <div class="table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <h5>Dimensões (comprimento X largura X altura) (cm)</h5>
                    </td>
                    <td>
                      <h5><?php echo "$dimensoes"; ?></h5>
                    </td>
                  </tr>
              
                  
                  <tr>
                    <td>
                      <h5>Peso (g)</h5>
                    </td>
                    <td>
                      <h5><?php echo "$peso"; ?></h5>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5>Unidade de venda:</h5>
                    </td>
                    <td>
                      <h5><?php echo "$un"; ?></h5>
                    </td>
                  </tr>
                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Product Description Area =================-->

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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/stellar.js"></script>
    <script src="../vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="../vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="../vendors/isotope/isotope-min.js"></script>
    <script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../vendors/jquery-ui/jquery-ui.js"></script>
    <script src="../vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendors/counter-up/jquery.counterup.js"></script>
    <script src="../js/theme.js"></script>
  </body>
</html>
