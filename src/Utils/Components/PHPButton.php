<?php

namespace PHPresentation\Utils\Components;

class PHPButton extends PHPComponent
{
  private $title;

  public function __construct($content = array('text'=>'Lien', 'link'=>'http://localhost:8000'))
  {
    parent::__construct('core/PHPButton.html.twig', $content);
  }
}
