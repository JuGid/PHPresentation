<?php

namespace PHPresentation\Utils\Factory;

use PHPresentation\Utils\Components\PHPComponent;
use ReflectionClass;
use PHPresentation\Utils\Factory\PHPComponentFactoryInterface;

/**
* Just build component throught PHPComponentContainer
* @author Julien GIDEL
*/
class PHPComponentFactory implements PHPComponentFactoryInterface
{

  private $resolved_components;

  public function __construct() {
    $this->resolved_components = [];
  }

  public function buildComponents($components) {
    foreach($components as $component) {
      $this->resolved_components[] = $this->resolve($component[0], $component[1]);
    }

    return $this->resolved_components;
  }

  public function buildComponent($component) {
    return $this->resolve($component[0], $component[1]);
  }

  public function resolve($type, $options) {
    return PHPComponentContainer::getComponent($type, $options);
  }

}
