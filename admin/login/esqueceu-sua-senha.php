<?php
    error_reporting(E_ALL ^ E_WARNING);
    session_start();
    include "../assets/includes/constants.php";
    include DIR_ADMIN . "/assets/includes/autoload.php";
    include DIR_ADMIN . "/assets/includes/function.inc.php";
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ABC - BLUMENAU</title>
        <!-- Bootstrap core CSS-->
        <?php include DIR_ADMIN . "/assets/layout/head.php"?>
    </head>
    <body class="bg-dark">
        <div class="container">
            <div class="card card-login mx-auto mt-5">
                <div class="card-header text-center"><h5>Esqueceu sua senha?</h5></div>
                <div class="card-body">
                    <div class="text-center mb-5">
                        <p>Digite seu endereço de e-mail e nós lhe enviaremos instruções sobre como redefinir sua senha.</p>
                    </div>
                    <form method="post" action="<?php echo get_url_admin()?>/login/">
                        <div class="form-group">
                            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="bombeiro@gmail.com">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small" href="<?php echo get_url_admin() ?>/login/">Página de login</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <?php include DIR_ADMIN . "/assets/layout/foot.php"?>
    </body>
</html>