<?php

namespace PHPresentation;

class PHPSection
{
  private $name;

  /**
  * Represent the slides contained in the section.
  * Each index represents a slide
  */
  private $slides;

  public function __construct($name="")
  {
    $this->name = $name;
    $this->slides = [];
  }

  public function getName()
  {
    return $this->name;
  }

  public function getSlides() {
    return $this->slides;
  }

  public function slides() {
    return count($this->getSlides());
  }

  public function getSlide($index) {
      return $this->slides[$index];
  }

  public function last() {
    return array_key_last($this->slides);
  }

  public function first() {
    return array_key_first($this->slides);
  }

  public function createSlide() {
    $slide = new PHPSlide();
    $this->add($slide);
    return $slide;
  }

  public function has($index) {
    return isset($this->slides[$index]);
  }

  public function add($slide)
  {
    $this->slides[] = $slide;
  }

  public function reset() {
    unset($this->slides);
    $this->slides = [];
  }

  public function render($index) {
    return $this->slides[$index]->render();
  }
}
