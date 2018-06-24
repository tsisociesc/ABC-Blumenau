<?php
    define("ENV", "dev");
    //define("ENV", "prod");

    $patch = array_filter(explode('/', $_SERVER['PHP_SELF']));
    if (ENV === "dev") {
        $base = "/" . $patch[1];
        $modulo = $patch[3];
        $operacao = $patch[4];
    } else {
        $base = "";
        $modulo = $patch[2];
        $operacao = $patch[3];
    }

    $operacao = str_replace(".php", "" , $operacao);

    if (strpos(__DIR__, '/')) {
        $bar = '/';
    } else {
        $bar = '\\';
    }

    $arrDir = explode($bar, __DIR__);
    $arrPatch = array("assets", "includes");
    $dir = "";

    foreach ($arrDir as $key => $value) {
        if (!in_array($value, $arrPatch)) {
            $dir .= ($key > 0 ? $bar : "") . $value;
        }
    }

    define("HOST" , $_SERVER['HTTP_HOST']);
    define("BASE", $base);
    define("MODULO", $modulo);
    define("OPERACAO", $operacao);
    define("DIR_ADMIN" , $dir);
