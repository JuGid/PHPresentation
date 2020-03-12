<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPBlock extends PHPComponent
{
  public function __construct($options = array('title'=>'title', 'content'=>'content'))
  {
    parent::__construct('core/PHPBlock.html.twig', $options);
  }

  public function options() {
    return [
      'text_align'=>['center', 'left', 'right'],
      'title_align'=>['center', 'left', 'right'],
      'align'=>['center', 'left', 'right']
    ];
  }

}
