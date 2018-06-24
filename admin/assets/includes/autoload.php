<?php
    include DIR_ADMIN . "/assets/src/PFBC/Form.php";

    include DIR_ADMIN . "/classes/util/Connection.php";
    include DIR_ADMIN . "/classes/util/Breadcrump.php";
    include DIR_ADMIN . "/classes/util/Query.php";

    $path = DIR_ADMIN . "/classes/";
    $diretorio = dir($path);
    while($arquivo = $diretorio->read()){
        if (strpos($arquivo, '.php') !== false) {
            include DIR_ADMIN . "/classes/$arquivo";
        }
    }
    $diretorio->close();