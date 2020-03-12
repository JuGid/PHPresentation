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
}
