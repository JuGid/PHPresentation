<?php

namespace PHPresentation\Utils\Factory;

interface PHPComponentFactoryInterface
{
  public function buildComponents($text_components);

  public function resolve($type, $options);
}
