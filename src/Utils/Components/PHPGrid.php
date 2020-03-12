<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Factory\PHPcomponentBuilder;
use PHPresentation\Utils\Components\PHPRow;
use PHPresentation\Utils\Template;

/**
* @author Julien GIDEL
*/
class PHPGrid extends PHPComponent
{

  private $number_of_row;

  private $number_of_col;

  private $rows_components;

  private $current_row;

  public function __construct($col = 1)
  {
    $this->number_of_col = $col;
    $this->template = new Template('core/PHPGrid.html.twig');
    $this->rows_components = [];
  }

  public function hasCurrentRow() {
    return null !== $this->current_row;
  }

  public function beginRow() {
    $new_row = new PHPRow($this->number_of_col);

    $this->rows_components[] = $new_row;
    $this->current_row = $new_row;
    $this->number_of_row++;
    return $this;
  }

  public function endRow() {
    $this->current_row = null;
    return $this;
  }

  public function add($type, $options) {
    $this->current_row->add($type, $options);
  }

  /**
  * @return array $rows HTML of rows contained in the PHPGris
  */
  public function render() {
    $rows = [];
    foreach($this->rows_components as $row) {
      $rows[] = $row->render();
    }
    $data = ['rows'=>$rows];

    $this->template->setData($data);

    return $this->template->render();
  }



}
