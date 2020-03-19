<?php

namespace PHPresentation\Utils\Factory;

use ReflexionClass;

/**
* This is not a really container since the components are not instanciated
* but it can translate a component String to en real component Object.
* This is why I called it a Container.
* @author Julien GIDEL
*/
class PHPComponentContainer
{
  public static function getComponent($component_type, $options, $namespace = 'PHPresentation\Utils\Components\\', $prefix = 'PHP') {
    $resolved_type = strtolower($component_type);
    $resolved_type = $namespace . $prefix . ucfirst($resolved_type);

    if(!class_exists($resolved_type)) {
      throw new \Exception('The type '.$resolved_type . ' that you defined as '.$component_type.' is not a valid component type for PHPresentation. Use predefined function instead of add() function.');
    }
    return new $resolved_type($options);
  }
}
