<?php
    $id = null;

    /**
     * Aqui verifica ser o usuráio irá cadastrar ou editar um registro, será passado a pk do registro pelo parâmetro GET.
     * http://php.net/manual/pt_BR/reserved.variables.get.php
     */

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (!is_null($id)) {
        /**
         * Caso for alteração, será consultado o registro no banco de dados e carregado o objeto.
         */
        $sql = GraduacaoQuery::sqlSimples(array("id = $id"));
        $object = GraduacaoQuery::consultar($sql, true);
    }  else {
        /*
         * Caso seja cadastro, somente será instanciado um novo objeto.
         */
        $object = new Graduacao();
    }

    /**
     * Essa parte será executada somente quando o registro for salvo.
     */
    if (isset($_POST['data'])) {
        /**
         * O método setArray() popula os atributos com os valores.
         */
        $object->setArray($_POST['data']);
        /**
         * O método salvar() gerará o insert ou update dependendo ser for cadastro ou alteração.
         */
        $object->salvar();

        /**
         * Retorna para a listagem
         */
        header("location: " . get_url_admin() . "/" . MODULO . "/list.php");
    }