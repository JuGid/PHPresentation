<?php

namespace PHPresentation\Utils\Components;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Template;
use PHPresentation\Utils\Size;

/**
* Main component class. Contains every functions a component needs.
* Every components MUST extends this abstract method.
* Implementing Renderable and PHPComponentInterface help for extension purpose
* Rendering is always done by the TwigManager inside template.
* @author Julien GIDEL
*/
abstract class PHPComponent implements Renderable, PHPComponentInterface
{

  /**
  * @var Template
  */
  protected $template;

  private $options;

  public function __construct($template_file, $options)
  {
    $this->template = new Template($template_file);
    $this->options = $options;
  }

  public function setTemplate($template)
  {
    $this->template = $template;
  }

  public function getTemplate()
  {
    return $this->template;
  }

  protected function getOptions() {
    return $this->options;
  }

  /**
  * Throught the validation and template, render the component
  */
  public function render()
  {
    if($this->verify()) {
      $this->getTemplate()->setData($this->options);
      return $this->getTemplate()->render();
    }
  }

  /**
  * Verify if the passed options are valid.
  *
  */
  public function verify() {
    $valid_options = $this->options();

    foreach($this->options['options'] as $option=>$value) {
      if(!array_key_exists($option, $valid_options)) {
        throw new \Exception('The option '.$option. ' is not a valid option name for '.get_class($this));
      }

      if(null !== $valid_options[$option] && !in_array($value, $valid_options[$option])) {
        throw new \Exception('The value '.$value.' is not a valid value for option '. $option . ' for '.get_class($this));
      }

    }
    return true;
  }

  /**
  * Define all valid options for validation
  *
  * @return array Array of options with ['option_name'=> ['valid_values']] or ['option_name'=>null] if it doesn't need values
  */
  abstract public function options();
}
