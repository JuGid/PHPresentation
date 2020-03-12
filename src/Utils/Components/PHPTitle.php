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
}
