<!DOCTYPE html>
<html>
<head>
    <?php include DIR_ADMIN . "/assets/layout/head.php"; ?>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Side Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">
        ABC - BLUMENAU
    </a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <span class="text-uppercase navbar-brand"><?php echo $tituloDaPagina ?></span>
        <?php include DIR_ADMIN . "/assets/layout/bar.menu.php" ?>
        <?php include DIR_ADMIN . "/assets/layout/bar.top.php"?>
    </div>
</nav>

<div class="content-wrapper">
    <div class="container-fluid">
        <?php include DIR_ADMIN . "/assets/layout/breadcrump.php"?>

        <?php if (OPERACAO == 'list' && file_exists(DIR_ADMIN . '/' . MODULO . '/components/' . OPERACAO . '/buttons.php')) : ?>
            <?php include  DIR_ADMIN . '/' . MODULO . '/components/' . OPERACAO . '/buttons.php'; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <?php include DIR_ADMIN . '/' . MODULO . '/components/' . OPERACAO . '/contents.php'; ?>
            </div>
        </div>

    </div>
</div>
<?php include DIR_ADMIN . "/assets/layout/foot.php" ?>
</body>
</html>