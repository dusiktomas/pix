<?php
class XpathCover {
  /* This class is cover for Xpath */

  private $xpathResult = Null;

  /* Expecting xpath for getting content */
  public function __construct(DOMXpath $xpathResult){
    $this->xpathResult = $xpathResult;
  }

  public function getNodeValuesFromQuery($query){
    $array = array();
    foreach($this->getXpathResult()->query($query) as $result){
      $array[] = $result->nodeValue; 
    }
    if(empty($array)){
      throw new NothingFoundException('Nothing found from content! by using: '.$query);
    }
    return $array;
  }

  public function getFirstValueFromQuery($query){
    /* because of compability of php version */
    $values = $this->getNodeValuesFromQuery($query);
    return $values[0];
  }

  private function getXpathResult(){
    return $this->xpathResult;
  }
}
class NothingFoundException extends Exception{}
