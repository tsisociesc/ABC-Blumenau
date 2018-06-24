<?php
    error_reporting(E_ALL ^ E_WARNING);
    session_start();
    include "includes/constants.php";
    include DIR_ADMIN . "/assets/includes/autoload.php";
    include DIR_ADMIN . "/assets/includes/function.inc.php";

    $fileActions = DIR_ADMIN . "/" . MODULO . "/actions/" . OPERACAO . "/actions.php";

    if (file_exists($fileActions)) {
        include $fileActions;
    }

    include DIR_ADMIN . "/assets/views/view.php";

