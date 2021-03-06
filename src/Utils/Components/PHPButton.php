<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPButton extends PHPComponent
{
  private $title;

  public function __construct($content = array('text'=>'Lien', 'link'=>'http://localhost:8000'))
  {
    parent::__construct('core/PHPButton.html.twig', $content);
  }

  public function options() {
    return [
      'new_tab'=> [true, false],
      'badge'=>null,
      'bacolor'=>['light', 'primary', 'danger', 'warning', 'success'],
      'margin_top'=>[1,2,3,4,5,0],
      'margin_bottom'=>[1,2,3,4,5,0]
    ];
  }

}
