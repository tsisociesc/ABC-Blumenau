<?php
    if (file_exists(DIR_ADMIN . '/' . MODULO . '/components/' . OPERACAO . '/breadcrump.php')) :
        include DIR_ADMIN . '/' . MODULO . '/components/' . OPERACAO . '/breadcrump.php';
?>
    <ol class="breadcrumb">
        <?php echo $breadcrump->render(); ?>
    </ol>
<?php
    endif;
?>