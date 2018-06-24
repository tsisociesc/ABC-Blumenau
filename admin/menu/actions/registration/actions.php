<?php
    $id = null;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (!is_null($id)) {
        $sql = MenuQuery::sqlSimples(array("id = $id"));
        $object = MenuQuery::consultar($sql, true);
    }  else {
        $object = new Menu();
    }

    if (isset($_POST['data'])) {
        $object->setArray($_POST['data']);
        $object->salvar();

        header("location: " . get_url_admin() . "/menu/list.php");
    }