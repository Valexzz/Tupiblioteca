<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <title> Página de login </title>
        <link rel="stylesheet" href="css/login_design.css">
        <!-- style css -->
        <link rel="stylesheet" href="css/style.css">
        <!-- Responsive-->
        <link rel="stylesheet" href="css/responsive.css">
        <!-- fevicon -->
        <link rel="icon" href="images/fevicon.png" type="image/gif" />
        <link rel="shortcut icon" href="icon/book icon.webp" type="image/x-icon"/>
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    </head>
    <body>
        <div class="loader_bg">
            <div class="loader"><img src="images/loading.gif" alt="#" /></div>
        </div>
        <button style="float:left" class="btn btn-danger ml-4" onclick="location.replace('index.php') ">Sair</button>
        <div class="container mt-4">
            <!-- code here -->
            <div class="card">
                <div class="card-image">	
                    <h2 class="card-heading">
                        Para acessar a Página de cadastro
                        <br>
                        É necessário ser administrador!
                    </h2>
                </div>
                <form class="card-form" onsubmit="return validar()" action="adm.php" method="POST" autocomplete="off">
                <div id="print" class="mensagem">
                </div>
                    <div class="input">
                        <input type="text" class="input-field" id="usuario" name="usuario" autocomplete="off"/>
                        <label class="input-label">Usuário</label>
                        </br>
                    </div>
                    <div class="input">
                        <input type="password" class="input-field" id="senha" name="senha" autocomplete="off"/>
                        <label class="input-label">Senha</label>
                        </br>
                    </div>
                    <div class="action" id="botao" >
                        <button class="action-button">Logar</button>
                    </div>
                    </br>
                </form>
                <?php if (isset($_GET['login']) && $_GET['login'] == 'invalido'){ ?> 
                    <p class="alert-danger p-2"> Erro no login, verifique se o usuario ou senha estão corretos!</p>
                  <?php }
                  else if (isset($_GET['sessao']) && $_GET['sessao'] == 'invalido'){
                    ?> <p class="alert-danger p-2"> Sessão encerrada! </p>
                  <?php } ?>
            </div>
        </div>
        <!-- Javascript files-->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery-3.0.0.min.js"></script>
        <script src="js/plugin.js"></script>
        <script src="js/login_function.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>