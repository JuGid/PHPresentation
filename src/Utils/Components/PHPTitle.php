<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPTitle extends PHPComponent
{
  public function __construct($content = array('content'=>'title'))
  {
    parent::__construct('core/PHPTitle.html.twig', $content);
  }

  public function options() {
    return [
      'content'=>null,
      'text_align'=>['center', 'left', 'right']
    ];
  }
}
