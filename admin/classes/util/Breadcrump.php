<?php

class Breadcrump
{
    private $itens;

    public function __construct()
    {
        $this->add("Início", '/');
    }

    public function addItens($v){
        $this->itens[] = $v;
    }

    public function getItens() {
        return $this->itens;
    }

    public function add($discricao, $link = '') {
        $this->addItens(array($discricao, $link));
    }

    public function render() {
        $html = '';

        foreach ($this->getItens() as $key => $item) {

            $html .= sprintf('<li class="breadcrumb-item %s">', ($key+1 == count($this->getItens()) ? 'active' : ''));

            if ($item[1] != '') {
                $html .= sprintf('<a href="%s">%s</a>', get_url_admin() . $item[1], $item[0]);
            } else {
                $html .= $item[0];
            }

            $html.= '</li>';
        }

        return $html;
    }

}