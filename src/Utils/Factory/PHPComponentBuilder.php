<?php

namespace PHPresentation\Utils\Factory;

use PHPresentation\Utils\Factory\PHPComponentFactory;
use PHPresentation\Utils\Factory\PHPComponentFactoryInterface;
use PHPresentation\Utils\Components\PHPComponent;

class PHPComponentBuilder
{
  private $factory;

  private $components = [];

  private $unresolved_components = [];

  public function __construct(PHPComponentFactoryInterface $factory = null) {
    if(null === $factory) {
      $factory = new PHPComponentFactory();
    }
    $this->setFactory($factory);
  }

  public function create() {
    $this->addComponents($this->factory->buildComponents($this->unresolved_components));
  }

  public function createViews() {
    if(!empty($this->unresolved_components)) {
      $this->create();
      $this->unresolved_components = [];
    }

    $views = array();
    foreach($this->components as $comp) {
      $views[] = $comp->render();
    }
    return $views;
  }

  public function add($type, $options) {
    if(null !== $type && !\is_string($type) && !$type instanceof PHPComponentInterface) {
      throw new Exception('Unexpected type for the component.');
    }

    if($type instanceof PHPComponentInterface) {
      $this->components[] = [$type, $options];
    } else {
      $this->unresolved_components[] = [$type, $options];
    }

  }

  private function addComponents($components) {
    foreach($components as $c) {
      array_push($this->components, $c);
    }
  }

  public function getUnresolvedComponent($index) {
    return $this->unresolved_components[$index];
  }

  private function setFactory(PHPComponentFactoryInterface $factory) {
    $this->factory = $factory;
  }
}
