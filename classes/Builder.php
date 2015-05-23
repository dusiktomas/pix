<?php
class Builder {
  /* 
   * This class is for building raw content from given url
   */

  private $rawXpathContent = Null;
  private $parsingUrl = Null;

  public function __construct($url){
    $this->parsingUrl = $url;
  }

  /* build raw xpath result */
  private function buildContentFromUrl(){
    if($this->rawXpathContent === Null){
      $dom = new DOMDocument();
      //mute not valid html chars
      @$dom->loadHTMLFile($this->parsingUrl);
      $xpath = new DOMXpath($dom);
      $this->rawXpathContent = $xpath;
    }
    return $this->rawXpathContent;
  }

  /* get xpath result */
  public function getXpathResult(){
    return $this->buildContentFromUrl();
  }
}
