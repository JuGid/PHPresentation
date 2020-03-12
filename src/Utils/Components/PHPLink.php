<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPLink extends PHPComponent
{
  private $title;

  public function __construct($content = array('text'=>'Lien', 'link'=>'http://localhost:8000'))
  {
    parent::__construct('core/PHPLink.html.twig', $content);
  }

  public function options() {
    return [
      'link'=>null,
      'new_tab'=>[true, false]
    ];
  }
}
