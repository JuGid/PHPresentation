<?php

namespace PHPresentation\Utils;

use PHPresentation\Utils\Renderable;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use PHPresentation\Utils\TwigManager;

/**
* Represents a template with data and file to render.
* It is used for facilitating the rendering by setting a Template object that manage data
* and rendering from TwigManager
* @author Julien GIDEL
*/
class Template implements Renderable
{
  protected $file;

  protected $data;

  public function __construct($fileDir)
  {
    $this->file = $fileDir;
  }

  public function setData($data)
  {
    $this->data = $data;
    return $this;
  }

  public function getData()
  {
    return $this->data;
  }

  public function access($index)
  {
    if($index > count($this->data))
    {
      throw new \OutOfRangeException('Cannot access this index');
    }

    return $this->data[$index];
  }

  public function render()
  {
    return TwigManager::getTwig()->render($this->file, $this->data);
  }
}
