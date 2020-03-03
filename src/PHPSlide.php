<?php

namespace PHPresentation;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Factory\PHPcomponentBuilder;

class PHPSlide implements Renderable
{
  private $builder;

  public function __construct()
  {
    $this->setBuilder(new PHPComponentBuilder());
  }

  public function add($type, array $options) {
    $this->builder->add($type, $options);
    return $this;
  }

  private function setBuilder(PHPComponentBuilder $builder) {
    $this->builder = $builder;
  }

  public function render()
  {
    return $this->builder->createViews();
  }

  public function block(string $title, string $content) {
    $this->add('block', array(
      'title'=>$title,
      'content'=>$content
    ));
    return $this;
  }

  public function button(string $link, string $text) {
    $this->add('button', array(
      'link'=>$link,
      'text'=>$text
    ));
    return $this;
  }

  public function image(string $content) {
    $this->add('image', array(
      'content'=>$content
    ));
    return $this;
  }

  public function link(string $link, string $text) {
    $this->add('link', array(
      'link'=>$link,
      'text'=>$text
    ));
    return $this;
  }

  public function list(array $content) {
    $this->add('list', array(
      'content'=>$content
    ));
    return $this;
  }

  public function text(string $content) {
    $this->add('text', array(
      'content'=>$content
    ));
    return $this;
  }

  public function title(string $content) {
    $this->add('title', array(
      'content'=>$content
    ));
    return $this;
  }

}
