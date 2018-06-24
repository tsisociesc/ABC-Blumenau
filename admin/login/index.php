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
                <div class="card-header text-center"><h5>ABC - BLUMENAU</h5></div>
                <div class="card-body">
                    <form action="<?php echo get_url_admin() ?>/dashboard" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="bombeiro@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Senha</label>
                            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="********">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    </form>
                    <div class="text-center">
                        <a class="d-block small" href="<?php echo get_url_admin() ?>/login/esqueceu-sua-senha.php">Esqueceu sua senha?</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <?php include DIR_ADMIN . "/assets/layout/foot.php"?>
    </body>
</html>