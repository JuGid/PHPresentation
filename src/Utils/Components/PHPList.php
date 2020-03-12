<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
class PHPList extends PHPComponent
{

  public function __construct($content = array('content'=>['Element 1','Element 2']))
  {
    parent::__construct('core/PHPList.html.twig', $content);
  }

  public function options() {
    return [
      'content'=>null,
      'style'=>['alpha', 'roman', 'decimal', 'square', 'circle', 'none', 'normal']
    ];
  }

}
