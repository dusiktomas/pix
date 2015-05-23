<?php
require_once 'vendor/twig/twig/lib/Twig/Autoloader.php';
/* not autoloader needed for small app */
require 'classes/Builder.php';
require 'classes/XpathCover.php';
require 'classes/Parser.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => 'compilation_cache',
    'auto_reload' => true,
));

$renderArray = array();
if(isset($_GET['product'])){
  $builder = new Builder(htmlspecialchars($_GET['product']));
  $parser = new Parser(new XpathCover($builder->getXpathResult()));
  try {
    $renderArray = array(
      'product' => array(
        'name' => $parser->getProductName(),
        'price' => $parser->getProductPrice(),
        'inStock' => $parser->getInStockValue(),
      )
    );
  }catch(Exception $e){
    /* Here we could log this situation ErrorLogger::add($e->getMessage())*/
    print 'Product information was not found, probably nod valid url';
    return;
  }
}
$template = $twig->loadTemplate('index.html');
print($template->render($renderArray));
