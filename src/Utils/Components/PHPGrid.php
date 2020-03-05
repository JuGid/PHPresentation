<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Factory\PHPcomponentBuilder;
use PHPresentation\Utils\Components\PHPRow;

class PHPGrid extends PHPComponent
{
  private $builder;

  private $number_of_row;

  private $number_of_col;

  private $rows_components;

  private $current_row;

  public function __construct($col = 1)
  {
    $this->number_of_col = $col;
    $this->template = new Template('core/PHPCard.html.twig');
    $this->setBuilder(new PHPComponentBuilder());
    $this->rows_components = [];
  }

  public function beginRow() {
    $this->number_of_row++;
    $new_row = new PHPRow($this->number_of_col);

    $this->rows_components[] = $new_row;
    $this->current_row = $new_row;

    return $this;
  }

  public function endRow() {
    $this->current_row = null;
    return $this;
  }



}
