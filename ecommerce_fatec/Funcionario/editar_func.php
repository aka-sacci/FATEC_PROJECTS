<!DOCTYPE html>
<html lang="en">
<?php
$CPF = $_REQUEST["CPF"];
include_once "../Funcoes/BancoDeDados.php";
    
        $conexao = conectar(); 
        $sql = "select * from vendedor where cpf_cnpj_vend = '$CPF'"; 
        $resultado = $conexao->query($sql);

  ?>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="../img/fevicon.png" type="image/png" />
    <title>Canui - funcionário</title>
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
              <h2>Alterar cadastro do funcionário</h2>
              
            </div>
            <div class="page_link">
              <a href="../index.php">Home</a>
              <a href="employee-login.html">Área do Funcionário</a>
             <a href="employee-menu.html">Menu</a>
             <a href="selecionar_func.php">Selecionar funcionário</a>
             <a href="#">Alterar cadastro</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
      <div class="container">
          
        <div class="billing_details">
          <div class="row">
            <div class="col-lg-8">
              <h3></h3>
              <form
                class="row contact_form"
                action="altera_func.php"
                method="post"
                
              >
              <?php 
                  foreach ($resultado as $key => $registro) {
                    $id = $key;
                    $CPF = $registro["cpf_cnpj_vend"];
                    $nome = $registro["nome_vend"];
                    echo "<div class='col-md-6 form-group p_star'>";
                    echo " <input type='text' class='form-control' name='CPF' placeholder='CPF (Com pontos e traços)'
                    value='$CPF' readonly/>";
                    echo " </div>";
                    echo " <div class='col-md-6 form-group p_star'>";
                    echo " <input type='text' class='form-control'
                    name='nome' placeholder='Nome do funcionário' value='$nome' required/>";
                     echo " </div>";
                    }


                      ?>

                  <div class="col-md-6 form-group p_star">
                   <button class="main_btn" type="submit">Alterar</button>
                    </div> 
                  <div class="col-md-6 form-group p_star">

                    <?php 

        $conexao = conectar();
        $sql = "SELECT numero_compra FROM compra WHERE cpf_cnpj_vend = $CPF GROUP BY cpf_cnpj_vend";
        $resultado = $conexao->query($sql);
        $retorno = count($resultado->fetchAll());
       
        if($retorno != "0") {
          echo "<button href='deleta_func.php?cod=$CPF' class='genric-btn danger radius main_btn' disabled>Excluir</button>";
          echo "<p>Esse funcionário não pode ser deletado, pois há vendas registradas com esse funcionário</p>";
      }
        else echo "<a href='deleta_func.php?cod=$CPF' class='genric-btn danger radius main_btn'>Excluir</a>";
            ?>
            
            </div> 
              </form>
            </div>
           
          </div>
        </div>
      </div>
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
