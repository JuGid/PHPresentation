<?php

namespace PHPresentation\Utils\Components;

class PHPImage extends PHPComponent
{
  public function __construct($content = array('content'=>'lien'))
  {
    parent::__construct('core/PHPImage.html.twig', $content);
  }
}
