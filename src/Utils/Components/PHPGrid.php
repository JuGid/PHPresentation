<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Factory\PHPcomponentBuilder;
use PHPresentation\Utils\Components\PHPRow;

class PHPGrid extends PHPComponent
{
  private $builder;

  private $row;

  private $col;

  private $rows;

  private $current_row;

  public function __construct($col = 1)
  {
    $this->col = $col;
    $this->template = new Template('core/PHPCard.html.twig');
    $this->setBuilder(new PHPComponentBuilder());
  }

  public function beginRow() {
    $this->row++;
    $nRow = new PHPRow($this->col);

    $this->rows[] =$nRow;
    $this->$current_row = $nRow;

    return $this;
  }

  

}
