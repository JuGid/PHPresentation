<?php

namespace PHPresentation\Utils\Factory;

use PHPresentation\Utils\Factory\PHPComponentFactory;
use PHPresentation\Utils\Factory\PHPComponentFactoryInterface;
use PHPresentation\Utils\Components\PHPComponentInterface;

/**
* Build a collection of components
* @author Julien GIDEL
*/
class PHPComponentBuilder
{
  private $factory;

  private $components = [];

  private $ordered_components = [];

  public function __construct(PHPComponentFactoryInterface $factory = null) {
    if(null === $factory) {
      $factory = new PHPComponentFactory();
    }
    $this->setFactory($factory);
  }

  public function create() {
    foreach($this->ordered_components as $component) {
      if(!$component[0] instanceof PHPComponentInterface) {
        $this->addComponent($this->factory->buildComponent($component));
      } else {
        $this->addComponent($component[0]);
      }
    }
  }

  public function createViews() {
    if($this->notBuildedComponentExists()) {
      $this->create();
    }


    $views = array();
    foreach($this->components as $comp) {
      $views[] = $comp->render();
    }
    return $views;
  }

  private function notBuildedComponentExists() {
    foreach($this->ordered_components as $component) {
      if(!$component[0] instanceof PHPComponentInterface) {
        return true;
      }
    }
    return false;
  }

  public function add($type, $options) {
    if(null === $type && !$type instanceof PHPComponentInterface && !is_string($type)) {
      throw new \Exception('Unexpected type for the component.');
    }

    $this->ordered_components[] = [$type, $options];
  }

  private function addComponents($components) {
    foreach($components as $component) {
      $this->addComponent($component);
    }
  }

  private function addComponent($component) {
    array_push($this->components, $component);
  }

  public function getUnresolvedComponent($index) {
    return $this->unresolved_components[$index];
  }

  private function setFactory(PHPComponentFactoryInterface $factory) {
    $this->factory = $factory;
  }
}
