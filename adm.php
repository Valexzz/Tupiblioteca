<?php 
$recuperar_dados_adm = true;
require_once 'verifica_sessao.php';
require_once 'crud_biblioteca.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Parte administrativa</title>
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
      <!-- end header -->
      <div class="about-bg">
      <button onclick="location.replace('encerrar_sessao.php') " class="ml-1 mt-1 p-2 btn btn-danger" style="float:left;"> Encerrar sessão </button>
         <div class="container">
            <div class="row">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="abouttitle">
                     <h2>Parte administrativa</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- inicio inserção -->
      <h1 class="text-center mt-4 mb-3"> Cadastro de livros </h1>
      <div class="container">
         <form id="formulario_cadastro" action='crud_biblioteca.php' method="post" enctype="multipart/form-data">
            <input type="hidden" id="imagem_padrao" name="imagem_padrao" value="<?php echo isset($cadastro) ? $cadastro['imagem'] : ''?>">
            <div class="form-row">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label>Registro</label>
                  <select id="id" name="id" style="display:none" class="mb-4" onchange="editar(this.value)">
                     <option value="0">Criar novo registro</option>
                     <?php foreach($livros as $livro){ 
                           if ($livro['ativo_inativo'] == 'ativo') { ?>
                           <option value="<?php echo $livro['id_cadastro_geral']?>" <?php echo isset($cadastro) && $cadastro['id_cadastro_geral'] == $livro['id_cadastro_geral'] ? 'selected' : '' ?>><?php echo 'id: '.$livro['id_cadastro_geral'].' - '.$livro['titulo'] ?> </option>   
                     <?php }
                     } ?>
                  </select>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="imagem">Imagem</label>
                  <input id="imagem" name="imagem" type="file" accept="image/*" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                     <img id="preview" width="100px" height="100" src="<?php echo isset($cadastro) && $cadastro['imagem'] != '' ? $cadastro['imagem'] : '' ?>">
               </div>
            </div>
            <div class="form-row">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="titulo">Título</label>
                  <input type="text" class="campo" name="titulo" id="titulo" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['titulo'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="autor">Autor(es)</label>
                  <input type="text" class="campo" name="autor" id="autor" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['autores'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label>Tipo</label>
                  <select id="tipo" class="select_campo" name="tipo" style="display:none">
                     <option value="0" name="selecionar">Tipo</option>
                     <?php foreach($tipos as $tipo){ ?>
                           <option value="<?php echo $tipo['id_tipo_cadastro']?>" <?php echo isset($cadastro) && $cadastro['tipo'] == $tipo['descricao'] ? 'selected' : '' ?>><?php echo $tipo['descricao'] ?> </option>   
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="form-row mt-4">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="idioma">Idioma</label>
                  <input type="text" class="campo" name="idioma" id="idioma" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['idioma'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="ano">Ano de publicação</label>
                  <input type="number" class="campo" name="ano" id="ano" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['ano'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label>Cidade</label>
                  <select class="select_campo" id="cidade" name="cidade" style="display:none">
                     <option value="0" name="selecionar">Cidade</option>
                     <?php foreach($cidades as $cidade){ ?>
                           <option value="<?php echo $cidade['id_cidade']?>" <?php echo isset($cadastro) && $cadastro['cidade'] == $cidade['nome'] ? 'selected' : '' ?>><?php echo $cidade['nome'].' - '.$cidade['uf'] ?> </option>   
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="form-row mt-4">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="classificacao">Classificação</label>
                  <input type="text" class="campo" name="classificacao" id="classificacao" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['classificacao'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="edicao">Edição</label>
                  <input type="number" class="campo" name="edicao" id="edicao" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['edicao'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label>Categoria</label>
                  <select class="select_campo" id="categoria" name="categoria" style="display:none">
                     <option value="0" name="selecionar">Categoria</option>
                     <?php foreach($categorias as $categoria){ ?>
                           <option value="<?php echo $categoria['id_categoria']?>" <?php echo isset($cadastro) && $cadastro['categoria'] == $categoria['descricao'] ? 'selected' : '' ?>><?php echo $categoria['descricao'] ?> </option>   
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="form-row mt-4">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="barras">Código de barras</label>
                  <input type="text" class="campo" name="barras" id="barras" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['codigo_barras'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="isbn">ISBN</label>
                  <input type="text" class="campo" name="isbn" id="isbn" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['num_isbn'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label>Editora</label>
                  <select class="select_campo" id="editora" name="editora" style="display:none">
                     <option value="0" name="selecionar">Editora</option>
                     <?php foreach($editoras as $editora){ ?>
                           <option value="<?php echo $editora['id_editora']?>" <?php echo isset($cadastro) && $cadastro['editora'] == $editora['descricao'] ? 'selected' : '' ?>><?php echo $editora['descricao'] ?> </option>   
                     <?php } ?>
                  </select>
               </div>
            </div>
            <div class="form-row mt-4">
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="volume">Volume</label>
                  <input type="text" class="campo" name="volume" id="volume" autocomplete="off" value="<?php echo isset($cadastro) ? $cadastro['colecao_volume'] : ''?>">
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="assunto">Assunto</label>
                  <textarea id="assunto" class="campo" name="assunto" cols="22"><?php echo isset($cadastro) ? $cadastro['assunto'] : ''?></textarea>
               </div>
               <div class="col-sm-12 col-md-6 col-lg-4">
                  <label for="extra">Extra</label>
                  <textarea id="extra" name="extra" cols="22"><?php echo isset($cadastro) ? $cadastro['extra'] : ''?></textarea>
               </div>
            </div>
            <div class="form-row mt-4">
               <div class="col-md-12 col-lg-6">
               <label for="comentario">Comentário</label>
                  <textarea id="comentario" class="campo" name="comentario" rows="6" cols="30"><?php echo isset($cadastro) ? $cadastro['comentario'] : ''?></textarea>
               </div>
               <div class="col-md-12 col-lg-6">
                  <label for="resenha">Resenha</label>
                  <textarea id="resenha" class="campo" name="resenha" rows="6" cols="28"><?php echo isset($cadastro) ? $cadastro['resenha'] : ''?></textarea>
               </div>
            </div>
            <button class="mt-4 btn btn-primary" type="submit" name="cadastrar" onclick="return validar(document.getElementById('titulo').value, 1)">Cadastrar</button>
            <?php if (isset($cadastro)){ ?>
               <button class="mt-4 btn btn-warning" type="submit" name="atualizar" onclick="return validar('<?php echo $cadastro['titulo'] ?>', 0)">Atualizar</button>
            <?php } ?>
         </form>

      <!-- Livros -->
      <h1 class="text-center mt-4"> Registros </h1> 
      <?php 
      foreach($livros as $livro){
         $ativo = $livro['ativo_inativo'] == 'ativo' ? true : false; 
         $valor_botao = $ativo ? 'Desativar' : 'Ativar';
      ?>
      <div id="<?php echo 'registro '.$livro['id_cadastro_geral'] ?>" class="registro <?php echo $livro['ativo_inativo']?> mt-2 p-2">
         <h2 style="display:inline" >ID: <?php echo $livro['id_cadastro_geral']?></h2> 

         <form style="display:inline;" method="POST" action="crud_biblioteca.php?id=<?php echo $livro['id_cadastro_geral']?>" class="ml-3" >
            <button type="submit" name="<?php echo $valor_botao ?>" class="<?php echo $ativo ? 'btn btn-danger' : 'btn btn-primary' ?>" onclick="return <?php echo $ativo ? 'confirm(`Tem certeza que deseja desativar '.$livro['titulo'].' ?`)' : ''?>"> <?php echo $valor_botao ?></button>
         </form>
         
         <?php if ($ativo) { ?>
         <button type="submit" name="editar" class="btn btn-warning" onclick="editar(<?php echo $livro['id_cadastro_geral']?>)">Editar</button>
         <?php } ?>
         
         <a class="btn btn-primary" data-toggle="collapse" href="#mais_info<?php echo $livro['id_cadastro_geral']?>" role="button" aria-expanded="false" aria-controls="mais_info<?php echo $livro['id_cadastro_geral']?>">Mostrar mais</a>
         
         <?php
         $aviso = $ativo ? '' : '<p style="display:inline; font-weight:bold;" class="text-danger ml-3"> Inativo </p>'; 
         echo $aviso;
         ?>

         <h3 class="mt-2">Adquirido: <?php echo $livro['aquisicao']?></h3>
         <table class="table">
            <thead>
               <tr>
                  <th width="20%">
                     Tipo
                  </th>
                  <th width="20%">
                     Título
                  </th>
                  <th width="20%">
                     Autor
                  </th>
                  <th width="20%">
                     Editora
                  </th>
                  <th width="20%">
                     Imagem
                  </th>
               </tr>
               <tr>
                  <td width="20%">
                  <?php echo $livro['tipo']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['titulo']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['autores']?> 
                  </td>
                  <td width="20%">
                  <?php echo $livro['editora']?>
                  </td>
                  <td width="20%">
                  <?php if ($livro['imagem'] != '') {?>
                  <img src=<?php echo $livro['imagem']?> alt="Imagem indisponível!" width="100px">
                  <?php } else echo 'Não tem!'?>
                  </td>
               </tr>
            </thead>
            <tbody class="collapse" id="mais_info<?php echo $livro['id_cadastro_geral']?>">
               <tr>
                  <th width="20%">
                     Categoria
                  </th>
                  <th width="20%">
                     Ano de publicação
                  </th>
                  <th width="20%">
                     Adquirido
                  </th>
                  <th width="20%">
                     Edição
                  </th>
                  <th width="20%">
                     Volume
                  </th>
               </tr>
               <tr>
                  <td width="20%">
                  <?php echo $livro['categoria']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['ano']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['aquisicao']?> 
                  </td>
                  <td width="20%">
                  <?php echo $livro['edicao']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['colecao_volume']?>
                  </td>
               </tr>
               <tr>
                  <th width="20%">
                     Código de barras
                  </th>
                  <th width="20%">
                     ISBN
                  </th>
                  <th width="20%">
                     Idioma
                  </th>
                  <th width="20%">
                     Cidade
                  </th>
                  <th width="20%">
                     Assunto
                  </th>
               </tr>
               <tr>
                  <td width="20%">
                  <?php echo $livro['codigo_barras']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['num_isbn']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['idioma']?> 
                  </td>
                  <td width="20%">
                  <?php echo $livro['cidade'].' - '.$livro['uf']?>
                  </td>
                  <td width="20%">
                  <?php echo $livro['assunto']?>
                  </td>
               </tr>
               <tr>
                  <th width="33%" colspan="2">
                     Extra
                  </th>
                  <th width="66%" colspan="3">
                     Resenha
               </tr>
               <tr>
                  <td width="33%" colspan="2">
                  <?php echo $livro['extra']?>
                  </td>
                  <td width="66%" colspan="3">
                  <?php echo $livro['resenha']?>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
      <?php }
      mysqli_close($conexao);
      ?>


      <!-- end Books -->
      <!-- footer -->
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/adm.js"></script>
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