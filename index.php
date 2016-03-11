<?php
require_once dirname(__FILE__) . '/includes/autoload.php';

$p = new Produto();
//$p->setId(14);
$p->setNome("Câmera Digital");
$p->setDescricao("Câmera muito louca!");
$p->setPreco(200);

// echo '<pre>';
// echo $p->getId();echo '<br />';
// echo $p->getNome();echo '<br />';
// echo $p->getDescricao();echo '<br />';
// echo $p->getPreco();echo '<br />';


$pDao = new ProdutoDAO();

//$pDao->save($p);
//$pDao->excluir(14);
//$ps = $pDao->getList();
//$ps = $pDao->getProduto(12);
// echo '<pre>';
// var_dump($ps);

echo '<br>';
echo '________________________________';
echo '<br>';


$c = new Cliente();
$c->setId(2);
$c->setNome("Mariana Bota Um");
$c->setEmail("mariana@teste.com");
$c->setTelefone('4568-6666');

echo '<pre>';
echo $c->getId();echo '<br />';
echo $c->getNome();echo '<br />';
echo $c->getEmail();echo '<br />';
echo $c->getTelefone();echo '<br />';

$cDao = new ClienteDAO();
$cDao->excluir(2);

$cs = $cDao->getList();
echo '<pre>';
var_dump($cs);


