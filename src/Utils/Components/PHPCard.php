<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPCard extends PHPComponent
{
  public function __construct($content = array('content'=>'card'))
  {
    parent::__construct('core/PHPCard.html.twig', $content);
  }

  public function options() {
    return [
      'text_align'=>['center', 'left', 'right'],
      'shadow'=>[true, false],
      'margin_top'=>[1,2,3,4,5,0],
      'margin_bottom'=>[1,2,3,4,5,0]
    ];
  }

}
