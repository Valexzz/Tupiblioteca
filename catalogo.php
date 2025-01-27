<!DOCTYPE html>
<?php 
$recuperar_dados_catalogo = true;
require_once 'crud_biblioteca.php';
?>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Nossos livros</title>
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
   <body class="main-layout Books-bg">
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
                                 <li><a href="index.php">Início</a> </li>
                                 <li><a href="sobre.php">Sobre nós</a> </li>
                                 <li class="active"><a href="catalogo.php">Nossos livros</a></li>
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
      <div class="about-bg">
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="abouttitle">
                     <h2>Conheça nosso catálogo</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--Books -->
      <div class="container">
         <div class="card card-body">
            <div class="card-title">
               <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#filtros" aria-expanded="false" aria-controls="collapseExample">
                  Filtros <img src="images/filter.png" width="40">
               </button>
            </div>
            <div class="collapse show" id="filtros" >
               <form action="crud_biblioteca.php" method="POST">
                  <div class="row">
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" autocomplete="off" value="<?php echo isset($_GET['titulo']) ? $_GET['titulo'] : '' ?>" placeholder="qualquer título">
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="autor">Autor(es)</label>
                        <input type="text" name="autor" id="autor" autocomplete="off" value="<?php echo isset($_GET['autor']) ? $_GET['autor'] : '' ?>" placeholder="qualquer/quaisquer autor(es)">
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="tipo">Tipo</label>
                        <select style="display:none" id="tipo" name="tipo">
                           <option value="0">Qualquer tipo</option>
                           <?php foreach($tipos as $tipo){ ?>
                                 <option value="<?php echo $tipo['id_tipo_cadastro']?>" <?php echo $_GET['tipo'] == $tipo['id_tipo_cadastro'] ? 'selected' : '' ?>><?php echo $tipo['descricao'] ?> </option>   
                           <?php } ?>
                        </select>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="editora">Editora</label>
                        <select style="display:none" id="editora" name="editora">
                           <option value="0">Qualquer editora</option>
                           <?php foreach($editoras as $editora){ ?>
                                 <option value="<?php echo $editora['id_editora']?>" <?php echo $_GET['editora'] == $editora['id_editora'] ? 'selected' : '' ?>><?php echo $editora['descricao'] ?> </option>   
                           <?php } ?>
                        </select>
                     </div>
                     <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="categoria">Categoria</label>
                        <select style="display:none" id="categoria" name="categoria">
                           <option value="0">Qualquer categoria</option>
                           <?php foreach($categorias as $categoria){ ?>
                                 <option value="<?php echo $categoria['id_categoria']?>" <?php echo $_GET['categoria'] == $categoria['id_categoria'] ? 'selected' : '' ?>><?php echo $categoria['descricao'] ?> </option>   
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="row mt-4">
                     <div class="col-4">
                        <button type="submit" class="btn btn-secondary" name="filtrar">Filtrar</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="row">
            <?php foreach($catalogo as $livro){ ?>
            <div class="col-sm-6 col-md-4 mb-4">
               <div class="card mt-4">
                  <img class="card-img-top" src="<?php echo $livro['imagem'] ?>" alt="Card image cap" width="60%">
                  <div class="card-body">
                  <h4 class="card-title text-center"><b><?php echo $livro['titulo'] ?></b></h4>
                  <ul class="list-group list-group-flush">
                     <li class="list-group-item"><b>Tipo:</b> <?php echo $livro['tipo']?></li>
                     <li class="list-group-item"><b>Autor:</b> <?php echo $livro['autores']?></li>
                     <li class="list-group-item"><b>Editora:</b> <?php echo $livro['editora']?></li>
                     <li class="list-group-item"><b>Categoria: </b> <?php echo $livro['categoria']?></li>
                  </ul>
                  <p class="card-text mt-3"><?php //echo substr($livro['resenha'],0,130)?></p>
                  <a href="pagina_livro.php?id=<?php echo $livro['id_cadastro_geral']?>" class="btn btn-primary mt-2">Ver mais</a>
                  </div>
               </div>   
            </div>
            <?php } ?>
         </div>
      </div>
      <!-- end Books -->
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