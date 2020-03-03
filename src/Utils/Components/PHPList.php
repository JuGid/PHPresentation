<?php

namespace PHPresentation\Utils\Components;

class PHPList extends PHPComponent
{

  public function __construct($content = array('content'=>['Element 1','Element 2']))
  {
    parent::__construct('core/PHPList.html.twig', $content);
  }

}
