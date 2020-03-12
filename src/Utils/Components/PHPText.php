<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPText extends PHPComponent
{
  public function __construct($content = array('content'=>'text'))
  {
    parent::__construct('core/PHPText.html.twig', $content);
  }

  public function options() {
    return [
      'content'=>null,
      'text_align'=>['center', 'right', 'left']
    ];
  }

}
