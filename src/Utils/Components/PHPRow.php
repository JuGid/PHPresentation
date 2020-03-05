<?php

namespace PHPresentation\Utils\Components;

class PHPRow extends PHPComponent
{
  private $column;

  private $components;

  public function __construct($column = 3)
  {
    $this->column = $column;
    $this->template = new Template('core/PHPRow.html.twig');
    //$this->template->setData($valeurs);
  }

  public function setSize($column) {
    $this->column = $column;
  }
}
