<?php
/** @var $object Graduacao */

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

$form->addElement(new Element\Number("Sequencia:", "data[SEQUENCIA]", array(
    "value" => $object->getSequencia() ?: 0,
    "min" => "0"
)));

if (!is_null($id)) {
    $form->addElement(new Element\Hidden("data[ID]", $id));
}

$form->addElement(new Element\SaveButton());
$form->addElement(new Element\CancelButton(get_url_admin() . '/menu/list.php'));

$form->render();