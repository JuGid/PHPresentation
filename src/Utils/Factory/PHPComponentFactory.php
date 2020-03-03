<?php

namespace PHPresentation\Utils\Factory;

use PHPresentation\Utils\Components\PHPComponent;
use ReflectionClass;
use PHPresentation\Utils\Factory\PHPComponentFactoryInterface;

class PHPComponentFactory implements PHPComponentFactoryInterface
{

  public function buildComponents($text_components) {
    $resolved_components = array();
    foreach($text_components as $component) {
      $resolved_components[] = $this->resolve($component[0], $component[1]);
    }

    return $resolved_components;
  }

  public function resolve($type, $options) {
    return PHPComponentContainer::getComponent($type, $options);
  }

}
