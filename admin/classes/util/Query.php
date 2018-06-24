<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 17/06/2018
 * Time: 20:22
 */

class Query
{
    public static function sqlSimples($tabela = null, $colunas = array(), $filtros = array(), $ordens = array()) {
        $sql = " SELECT ";

        foreach ($colunas as $key => $coluna) {
            if ($key > 0) {
                $sql .= " , ";
            }

            $sql .= sprintf(" %s.%s AS %s ", $tabela, $coluna, $coluna);
        }

        $sql .= sprintf(" FROM %s ", $tabela);

        foreach ($filtros as $key => $filtro) {
            if ($key == 0) {
                $sql .= " WHERE ";
            } else {
                $sql .= " AND ";
            }

            $sql .= " $filtro ";
        }

        foreach ($ordens as $key => $ordem) {
            if ($key == 0) {
                $sql .= " ORDER BY ";
            } else {
                $sql .= " , ";
            }

            $sql .= " $ordem ";
        }

        return $sql;
    }

    public static function consultar($classe =null, $tabela = null, $colunas = array(), $sql = null, $returnOne = false) {
        $conn = new Connection();

        if (is_null($sql)) {
            $sql = self::sqlSimples($tabela, $colunas);
        }

        $result = array();

        foreach ($conn->executeQuery($sql) as $rows) {
            $object = new $classe();
            $object->setArray($rows);
            $result[] = $object;
        }

        return $returnOne ? current($result) : $result;
    }
}