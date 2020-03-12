<?php

namespace PHPresentation\Utils\Components;

/**
* @author Julien GIDEL
*/
interface PHPComponentInterface
{
  /**
  * Return a rendered Template
  *
  * @return Template The rendered template.
  */
  public function render();

  /**
  * Returns the options that are good for verification
  *
  * @return array $array The array with all existing options.
  */
  public function options();

  /**
  * Returns the options that are good and delete every bad options
  *
  * @return Exception If one option is false.
  */
  public function verify();
}
