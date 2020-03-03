<?php

namespace PHPresentation\Utils\Factory;

use ReflexionClass;

class PHPComponentContainer
{
  public static function getComponent($component_type, $options) {
    $resolved_type = strtolower($component_type);
    $resolved_type = 'PHPresentation\Utils\Components\PHP' . ucfirst($resolved_type);
    
    return new $resolved_type($options);
  }
}
