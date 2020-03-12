<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Template;
use PHPresentation\Utils\Factory\PHPcomponentBuilder;

/**
* @author Julien GIDEL
*/
class PHPRow extends PHPComponent
{
  private $column;

  private $components;

  private $builder;

  public function __construct($column = 3)
  {
    $this->column = $column;
    $this->template = new Template('core/PHPRow.html.twig');
    $this->builder = new PHPComponentBuilder();
  }

  public function setSize($column) {
    $this->column = $column;
  }

  public function add($type, $options) {
    $this->builder->add($type, $options);
  }

  public function render() {
    // il faut render les composants avant de les mettre dans un template
    $data = [
      'columns' => $this->column,
      'components'=>$this->builder->createViews()
    ];

    $this->template->setData($data);
    return $this->template->render();
  }

  public function options() {
    return [];
  }
}
