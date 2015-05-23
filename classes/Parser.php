<?php
class Parser {

  private $xpathCover = Null;
  private $xpathQueryMap = array(
    'productPrice' => "//div[@class='productPrices col12 ']/p/span[@class='currentPrice']/ins/@content",
    'productName' => "//section/section/h1/span",
    'inStock' => "//strong[@class='available nowrap weee']/i/@class",
  );

  public function __construct(XpathCover $xpathCover){
    $this->xpathCover = $xpathCover;
  }

  public function getProductPrice(){
    return $this->getCover()->getFirstValueFromQuery($this->getQueryFromMap('productPrice')); 
  }

  public function getProductName(){
    /* Because name is not in one element, we have to join it */
    $name = '';
    foreach($this->getCover()->getNodeValuesFromQuery($this->getQueryFromMap('productName')) as $result){
      $name .= $result.' ';
    }
    return trim($name);
  }

  public function getInStockValue(){
    /* check by icon-ok class */
    try {
      $this->getCover()->getFirstValueFromQuery($this->getQueryFromMap('inStock'));
      return 'Yes';
    }catch(NothingFoundException $e){
      /* if not found available element */
      return 'No';
    }
  }

  private function getQueryFromMap($item){
    $queryMap = $this->getXpathQueryMap();
    if(array_key_exists($item, $queryMap)){
      return $queryMap[$item];
    }
    throw new ItemNotFoundInQueryMapException('Item: '.$item.' does not exists in query map!');
  }

  private function getCover(){
    return $this->xpathCover;
  }

  private function getXpathQueryMap(){
    return $this->xpathQueryMap;
  }
}
class ItemNotFoundInQueryMapException extends Exception {}
