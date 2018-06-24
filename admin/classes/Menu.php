<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 17/05/2018
 * Time: 19:45
 */

class Menu
{
    private $id;
    private $descricao;
    private $link;
    private $icone;
    private $ordem;
    private $level;
    private $parent;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return Menu
     */
    public function setId($id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     *
     * @return Menu
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     *
     * @return Menu
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->icone;
    }

    /**
     * @param mixed $icone
     *
     * @return Menu
     */
    public function setIcone($icone)
    {
        $this->icone = $icone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrdem()
    {
        return $this->ordem;
    }

    /**
     * @param mixed $ordem
     *
     * @return Menu
     */
    public function setOrdem($ordem)
    {
        $this->ordem = (int) $ordem;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     *
     * @return Menu
     */
    public function setLevel($level)
    {
        $this->level = (int) $level;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     *
     * @return Menu
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Popula varios atributos de uma ve
     *
     * @param array $colunas
     */
    public function setArray($colunas = array()) {
        foreach ($colunas as $coluna => $valor) {
            $method = "set" . ucfirst($coluna);
            $this->$method($valor);
        }
    }

    /**
     * Retonar true se o objeto não está salvo
     */
    public function isNovo(){
        return is_null($this->getId());
    }

    public function salvar() {
        $conn = new Connection();

        $objMenu = MenuQuery::consultar(MenuQuery::sqlSimples(array("id = " . $this->getParent())), true);

        $this->setLevel($objMenu->getLevel()+1);

        if ($this->isNovo()) {
            $sql = " INSERT INTO " . MenuQuery::TABELA;

            $campos = array();
            $valores = array();
            foreach (MenuQuery::COLUNAS as $key => $coluna) {
                $metodoGet = "get" . ucfirst($coluna);

                if (!is_null($this->$metodoGet())) {
                    $campos[] = $coluna;

                    $valor = $this->$metodoGet();

                    if (is_string($valor)) {
                        $valor = "'$valor'";
                    }

                    $valores[] = $valor;
                }
            }

            $sql .= " (" . implode(",", $campos) . ") values (" . implode(",", $valores) . ") ";
        } else {
            $sql = " UPDATE " . MenuQuery::TABELA . " SET ";

            foreach (MenuQuery::COLUNAS as $key => $coluna) {
                $metodoGet = "get" . ucfirst($coluna);

                if (!is_null($this->$metodoGet())) {
                    if ($key > 0) {
                        $sql .= " , ";
                    }

                    $valor = $this->$metodoGet();

                    if (is_string($valor)) {
                        $valor = "'$valor'";
                    }

                    $sql .= "$coluna = $valor";
                }
            }

            $sql .= " WHERE id = " . $this->getId();
        }

        $conn->execute($sql);
    }

}