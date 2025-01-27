<!DOCTYPE html>
<?php 
$recuperar_dados_pagina_livro = true;
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
                                 <li class="active"><a href="livros.php">Nossos livros</a></li>
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
      <div class="container my-4" id="livro">
         <button class="btn btn-danger mb-4" onclick="history.back()"><img src="images/go_back.png" width="50"><h2 style="display:inline;color:white;"> Voltar</h2></button>
         <div class="row">
            <div class="col-6">
               <img src="<?php echo $um_livro['imagem']?>" width="100%">
            </div>
            <?php ?>
            <div class="col-6">
               <table class="table" id="informacoes">
                  <tr>
                     <th width="33%" >
                        Tipo
                     </th>
                     <th width="33%">
                        Título
                     </th>
                     <th width="33%">
                        Autor(es)
                     </th>
                  </tr>
                  <tr>
                     <td width="33%" >
                        <?php echo $um_livro['tipo']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['titulo']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['autores']?>
                     </td>
                  </tr>
                  <tr>
                     <th width="33%">
                        Editora
                     </th>
                     <th width="33%">
                        Edição
                     </th>
                     <th width="33%">
                        Ano de publicação
                     </th>
                  </tr>
                  <tr>
                     <td width="33%" >
                        <?php echo $um_livro['editora']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['edicao']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['ano']?>
                     </td>
                  </tr>
                  <tr>
                     <th width="33%">
                        Idioma
                     </th>
                     <th width="33%">
                        Classificação
                     </th>
                     <th width="33%">
                        Publicado na cidade
                     </th>
                  </tr>
                  <tr>
                     <td width="33%" >
                        <?php echo $um_livro['idioma']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['classificacao']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['cidade'].' - '.$um_livro['uf']?>
                     </td>
                  </tr>
                  <tr>
                     <th width="33%">
                        Volume
                     </th>
                     <th width="33%">
                        Código de barras
                     </th>
                     <th width="33%">
                        ISBN
                     </th>
                  </tr>
                  <tr>
                     <td width="33%" >
                        <?php echo $um_livro['colecao_volume']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['codigo_barras']?>
                     </td>
                     <td width="33%">
                        <?php echo $um_livro['num_isbn']?>
                     </td>
                  </tr>
                  <tr>
                     <th width="100%" colspan="2">
                        Assunto
                     </th>
                     <th width="100%">
                        Adquirido
                     </th>
                  </tr>
                  <tr>
                     <td width="50%" colspan="2">
                        <?php echo $um_livro['assunto']?>
                     </td>
                     <td width="50%">
                        <?php echo $um_livro['aquisicao']?>
                     </td>
                  </tr>
                  <?php if ($um_livro['extra'] != '') { ?>
                  <tr>
                     <th width="100%" colspan="3">
                        Extra
                     </th>
                  </tr>
                  <tr>
                     <td width="50%" colspan=3>
                        <?php echo $um_livro['extra']?>
                     </td>
                  </tr>
                  <?php } ?>
               </table>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-12">
               <h1 class="text-center">Resenha</h1>
               <p><?php echo $um_livro['resenha']?></p>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-12">
               <h1 class="text-center">Comentário</h1>
               <p><?php echo $um_livro['comentario']?></p>
            </div>
         </div>
         <div class="row mt-4">
            <div class="col-12">
               <button class="btn btn-warning mt-4"><img src="images/money.png" width="50"><h2 style="display:inline;"> Alugar</h2></button>
            </div>
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