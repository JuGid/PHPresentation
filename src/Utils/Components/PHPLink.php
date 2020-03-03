<?php

namespace PHPresentation\Utils\Components;

class PHPLink extends PHPComponent
{
  private $title;

  public function __construct($content = array('text'=>'Lien', 'link'=>'http://localhost:8000'))
  {
    parent::__construct('core/PHPLink.html.twig', $content);
  }
}
