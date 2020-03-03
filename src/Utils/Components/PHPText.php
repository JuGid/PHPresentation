<?php

namespace PHPresentation\Utils\Components;

class PHPText extends PHPComponent
{
  public function __construct($content = array('content'=>'text'))
  {
    parent::__construct('core/PHPText.html.twig', $content);
  }

}
