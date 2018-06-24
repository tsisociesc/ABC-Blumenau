<?php
/** @var $object Menu */

use PFBC\Form;
use PFBC\Element;


$form = new Form("form-elements");

$form->configure(array(
    "prevent" => array("bootstrap", "jQuery"),
    "class" => "row-border"
));

$form->addElement(new Element\Textbox("Descrição:", "data[DESCRICAO]", array(
    "value" => $object->getDescricao()
)));

$form->addElement(new Element\Textbox("Link:", "data[LINK]", array(
    "value" => $object->getLink()
)));

$form->addElement(new Element\Textbox("Icone:", "data[ICONE]", array(
    "value" => $object->getIcone()
)));

$form->addElement(new Element\Number("Ordem:", "data[ORDEM]", array(
    "value" => $object->getOrdem() ?: 0,
    "min" => "0"
)));

$options = array("1" => "-");

$filtro = array("level = 1");
if (!is_null($id)) $filtro[] = "id != $id";
$sqlMenuQuery = MenuQuery::sqlSimples($filtro, array("ordem ASC"));
$objMenuQuery = MenuQuery::consultar($sqlMenuQuery);

foreach ($objMenuQuery as $objMenu) /** @var $objMenu Menu */ {
    $options[$objMenu->getId()] = " - " . $objMenu->getDescricao();
}

$form->addElement(new Element\Select("Menu Pai:", "data[PARENT]", $options, array(
    "value" => $object->getParent(),
)));

if (!is_null($id)) {
    $form->addElement(new Element\Hidden("data[ID]", $id));
}

$form->addElement(new Element\SaveButton());
$form->addElement(new Element\CancelButton(get_url_admin() . '/menu/list.php'));

$form->render();