<?php

namespace PHPresentation\Utils\Components;

class PHPTitle extends PHPComponent
{
  public function __construct($content = array('content'=>'title'))
  {
    parent::__construct('core/PHPTitle.html.twig', $content);
  }
}
