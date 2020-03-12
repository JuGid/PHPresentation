<?php

namespace PHPresentation\Utils\Factory;

/**
* @author Julien GIDEL
*/
interface PHPComponentFactoryInterface
{
  public function buildComponents($text_components);

  public function resolve($type, $options);
}
