<?php

class Graduacao
{
    /**
     * Crie os atributos conforme o criado na tabela.
     */
    private $id;
    private $sequencia;
    private $descricao;

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
     * @return Graduacao
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSequencia()
    {
        return $this->sequencia;
    }

    /**
     * @param mixed $sequencia
     *
     * @return Graduacao
     */
    public function setSequencia($sequencia)
    {
        $this->sequencia = $sequencia;

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
     * @return Graduacao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Popula varios atributos de uma ve
     *
     * @param array $colunas
     */
    public function setArray($colunas = array()) {
        foreach ($colunas as $coluna => $valor) {
            $method = "set" . ucfirst(strtolower($coluna));
            $this->$method($valor);
        }
    }

    /**
     * Retonar true se o objeto não está salvo
     */
    public function isNovo(){
        return is_null($this->getId());
    }

    /**
     * Cria o insert ou o update dos campos como setado na contante COLUNAS na clase Query
     */
    public function salvar() {
        /**
         * Instancia a conexão com o banco de dados.
         */
        $conn = new Connection();

        /**
         * Identifica se o registro é novo
         */
        if ($this->isNovo()) {
            /**
             * Caso seja, será montado uma string com o insert
             */
            $sql = " INSERT INTO " . GraduacaoQuery::TABELA;

            $campos = array();
            $valores = array();
            /**
             * Aqui vai passar campo por campo para montar a atribuição dos valoes no insert
             */
            foreach (GraduacaoQuery::COLUNAS as $key => $coluna) {
                /**
                 * $metodoGet recebe o nome do método get da coluna
                 */
                $metodoGet = "get" . ucfirst(strtolower($coluna));


                if (!is_null($this->$metodoGet())) {
                    /**
                     * Aqui é montado dois arrays, $campo e $valores, o array $campo será responsavel por informar o
                     * nome das colunas que serão preenchidas e o array $valoes, corresponde ao valor de cadas coluna.
                     * Ambos tem que conter a mesma posição do array.
                     */
                    $campos[] = $coluna;

                    $valor = $this->$metodoGet();

                    if (is_string($valor)) {
                        $valor = "'$valor'";
                    }

                    $valores[] = $valor;
                }
            }

            /**
             * O impode() é um método nativo do php que converte um array em string separando cada posição
             * pelo caracter do primeiro parâmetro. Neste caso é a virgula(,).
             */
            $sql .= " (" . implode(",", $campos) . ") values (" . implode(",", $valores) . ") ";
        } else {
            /**
             * Caso o registro esteja sendo alterado será montado o update.
             */
            $sql = " UPDATE " . GraduacaoQuery::TABELA . " SET ";

            /**
             * Aqui se aplica a mesma regra anterior que percorre todas as colunas da tabela e monta o update.
             */
            foreach (GraduacaoQuery::COLUNAS as $key => $coluna) {
                $metodoGet = "get" . ucfirst(strtolower($coluna));
                $valor = $this->$metodoGet();

                if (!is_null($valor)) {
                    if ($key > 0) {
                        $sql .= " , ";
                    }

                    if (is_string($valor)) {
                        $valor = "'$valor'";
                    }

                    $sql .= "$coluna = $valor";
                }
            }

            /**
             * Adiciona a condição para alterar somente o registro desejado.
             */
            $sql .= " WHERE id = " . $this->getId();
        }

        /**
         * Alterando a condição para TRUE, será exibida na página o sql montado.
         */
        if (false){
            echo "<pre>";
            var_dump($sql);
            echo "</pre>";
            die;
        }

        /**
         * Executa o sql montado
         */
        $conn->execute($sql);
    }

}