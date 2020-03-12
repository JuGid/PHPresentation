<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPBlock extends PHPComponent
{
  public function __construct($content = array('title'=>'title', 'content'=>'content'))
  {
    parent::__construct('core/PHPBlock.html.twig', $content);
  }
}
