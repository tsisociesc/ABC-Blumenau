<?php
    $sql = MenuQuery::sqlSimples(array("level >= 1") , array("ordem ASC"));
    $objMenus = MenuQuery::consultar($sql);
