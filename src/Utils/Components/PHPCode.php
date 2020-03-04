<?php

namespace PHPresentation\Utils\Components;

class PHPCode extends PHPComponent
{
  public function __construct($content = array('content'=>'code'))
  {
    parent::__construct('core/PHPCode.html.twig', $content);
  }
}
