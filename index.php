<?php 
   $recuperar_dados_tres_livros = true;
   require_once 'crud_biblioteca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title> Tupiblioteca </title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <link rel="shortcut icon" href="icon/book icon.webp" type="image/x-icon"/>
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout home_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li class="active"> <a href="index.php">Início</a> </li>
                                 <li><a href="sobre.php">Sobre nós</a> </li>
                                 <li><a href="livros.php">Nossos livros</a></li>
                                 <li><a href="login.php">Página Administrativa</a></li>
                                 <li class="mean-last"> <a href="#"><img src="images/search_icon.png" alt="#" /></a> </li>
                                 <li class="mean-last"> <a href="#"><img src="images/top-icon.png" alt="#" /></a> </li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header>
      <!-- end header -->
      <section>
         <div id="myCarousel" class="carousel slide banner-main">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="images/banner.jpg" alt="First slide">
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1>A melhor livraria<br>já criada por alunos<br>de um Instituto Federal</h1>
                        <p>O que começou com um projeto terminou como... Um projeto!<br> Ainda não patenteamos esse site, então não estamos ganhando nada</br>por enquanto, mas quem sabe. Provavelmente vendamos os direitos</p><h3>
                        </br></br></br>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- about -->
      <div class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="aboutheading">
                     <h2>Sobre <strong class="black"> Nós...</strong></h2>
                     <span>Abaixo estão algumas coisas que possam querer saber sobre nós, os idealizadores deste projeto</span>
                  </div>
               </div>
            </div>
            <div class="row border">
               <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                  <div class="about-box">
                     <p>Somos alunos do Instituto Federal do Tocantins (IFTO) e nos reunimos com o intuito de criar um site fictício de uma biblioteca para um projeto integrador do nosso curso de Informática do segundo ano em 2022. Somos: Júlya Milhomem, Victor Alexandre Borges, Michelly de Sousa e Kauan Batista, e esperamos que gostem do nosso trabalho, mas não tente alugar livros aqui, os livros são reais e patenteados, esse site não é nenhuma dessas duas coisas.</p>
                  </div>
               </div>
               <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                  <div class="about-box">
                     <figure><img src="images/about.png" alt="img" /></figure>
                  </div>
               </div>
            </div>
         </div>
      </div><br><br>
      <!-- end about -->
      <!-- Livros -->
      <div class="Books">
         <div class="container">
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="titlepage">
                     <h2>Livros nacionais disponíveis para aluguel</h2>
                     <span>Contamos com um catálogo imenso de livros tanto nacionais quanto internacionais</span> 
                  </div>
               </div>
            </div>
            <div class="row box">
            <?php 
            foreach($tres_livros as $livro){ ?>
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                  <div class="book-box">
                     <figure><a href="pagina_livro.php?id=<?php echo $livro['id_cadastro_geral']?>"><img src="<?php echo $livro['imagem']?>" alt="img" style="min-height:400px;max-height:400px;"></a></figure>
                  </div>
               </div>
            <?php } ?> 
            </div>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="read-more">
                        <a href="catalogo.php">Veja mais</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div></br>
      <!-- fim Livros -->
      <!-- footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row pdn-top-30">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                     <div class="Follow">
                        <h3>Siga-nos</h3>
                     </div>
                     <ul class="location_icon">
                        <li> <a href="#"><img src="icon/facebook.png"></a></li>
                        <li> <a href="#"><img src="icon/Twitter.png"></a></li>
                        <li> <a href="#"><img src="icon/linkedin.png"></a></li>
                        <li> <a href="https://www.instagram.com/infodois/"><img src="icon/instagram.png"></a></li>
                     </ul>
                  </div>
                  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                     <div class="Follow">
                        <h3>Receba atualizações:</h3>
                     </div>
                     <input class="Newsletter" placeholder="Informe seu email" type="Enter your email">
                     <button class="Subscribe">Inscreva-se</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <p>Não protegido por Copyright em 2022, então não temos Todos os Direitos Reservados <a href="https://html.design/"></a></p>
            </div>
         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>