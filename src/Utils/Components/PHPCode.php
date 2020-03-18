<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPCode extends PHPComponent
{
  public function __construct($content = array('content'=>'code'))
  {
    parent::__construct('core/PHPCode.html.twig', $content);
  }

  public function options() {
    return [
      'margin_top'=>[1,2,3,4,5,0],
      'margin_bottom'=>[1,2,3,4,5,0]
    ];
  }

}
