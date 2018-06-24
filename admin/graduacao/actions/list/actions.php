<?php
    /**
     * Aqui você monta um select para fazer a listagem dos registros,
     * Caso não tenha nenhuma associação, poderá utilizar o método abaixo.
     */
    $sql = GraduacaoQuery::sqlSimples(null , array("sequencia ASC"));

    /**
     *  A variável $objGraduacoes receberá um array de objetos carregado com os registros retornados do select.
     */
    $objGraduacoes = GraduacaoQuery::consultar($sql);
