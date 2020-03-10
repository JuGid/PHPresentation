<?php

namespace PHPresentation;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Factory\PHPcomponentBuilder;
use PHPresentation\Utils\Components\PHPGrid;

class PHPSlide implements Renderable
{
  private $builder;

  private $contentCentered;

  private $textCentered;

  private $current_grid;

  public function __construct()
  {
    $this->setBuilder(new PHPComponentBuilder());
    $this->contentCentered = false;
    $this->textCentered = false;
    $this->current_grid = null;
  }

  public function add($type, array $options = []) {
    if(null !== $this->current_grid && $this->current_grid->hasCurrentRow()) {
      $this->current_grid->add($type, $options);
    } else {
      $this->builder->add($type, $options);
    }
    return $this;
  }

  private function setBuilder(PHPComponentBuilder $builder) {
    $this->builder = $builder;
  }

  public function contentCentered() {
    $this->contentCentered = true;
    return $this;
  }

  public function textCentered() {
    $this->textCentered = true;
    return $this;
  }

  public function isContentCentered() {
    return $this->contentCentered;
  }

  public function isTextCentered() {
    return $this->textCentered;
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

  public function code(string $content) {
    $this->add('code', array(
      'content'=>$content
    ));
    return $this;
  }

  public function card(string $content) {
    $this->add('card', array(
      'content'=>$content
    ));
    return $this;
  }

  public function beginGrid($col) {
    $grid = new PHPGrid($col);
    $this->current_grid = $grid;
    return $this;
  }

  public function beginRow() {
    $this->current_grid->beginRow();
    return $this;
  }

  public function endRow() {
    $this->current_grid->endRow();
    return $this;
  }

  public function endGrid() {
    $this->add($this->current_grid);
    $this->current_grid = null;
    return $this;
  }

}
