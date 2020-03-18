<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPImage extends PHPComponent
{
  public function __construct($content = array('content'=>'lien'))
  {
    parent::__construct('core/PHPImage.html.twig', $content);
  }

  public function options() {
    return [
      'link'=>null,
      'new_tab'=>[true, false],
      'margin_top'=>[1,2,3,4,5,0],
      'margin_bottom'=>[1,2,3,4,5,0]
    ];
  }
}
