<?php
require_once dirname(__FILE__) . '/includes/autoload.php';

$p = new ProdutoBean();
$p->setId(12);
$p->setNome("Celular");
$p->setDescricao("Smartyphone Sansung");
$p->setPreco(750.5);

echo '<pre>';
echo $p->getId();echo '<br />';
echo $p->getNome();echo '<br />';
echo $p->getDescricao();echo '<br />';
echo $p->getPreco();echo '<br />';