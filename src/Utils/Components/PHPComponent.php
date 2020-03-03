<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Template;
use PHPresentation\Utils\Size;

abstract class PHPComponent implements Renderable, PHPComponentInterface
{

  /**
  * @var Template
  */
  protected $template;

  protected $content;

  public function __construct($template_file, $content)
  {
    $this->template = new Template($template_file);
    $this->getTemplate()->setData($content);
  }

  public function setTemplate($template)
  {
    $this->template = $template;
  }

  public function getTemplate()
  {
    return $this->template;
  }

  public function render()
  {
    return $this->getTemplate()->render();
  }

}
