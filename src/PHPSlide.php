<?php

namespace PHPresentation;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Factory\PHPcomponentBuilder;
use PHPresentation\Utils\Components\PHPGrid;

/**
* @author Julien GIDEL
*/
class PHPSlide implements Renderable
{

  /**
  * Build the entire slide when needed
  */
  private $builder;

  /**
  * Can center the content on the slide
  */
  private $contentCentered;

  /**
  * Can center the text on the slide
  */
  private $textCentered;

  /**
  * Used to point on the current grid if Begin grid is called
  */
  private $current_grid;

  /**
  * Set slide to show the footer (Display page number, presentaiton title, user name and date)
  */
  private $show_footer;

  public function __construct()
  {
    $this->setBuilder(new PHPComponentBuilder());
    $this->contentCentered = false;
    $this->textCentered = false;
    $this->current_grid = null;
    $this->show_footer = true;
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

  public function dontShowFooter() {
    $this->show_footer = false;
    return $this;
  }

  public function isContentCentered() {
    return $this->contentCentered;
  }

  public function isTextCentered() {
    return $this->textCentered;
  }

  public function showFooter() {
    return $this->show_footer;
  }

  public function render()
  {
    return $this->builder->createViews();
  }

  public function block(string $title, string $content, array $options = []) {
    $this->add('block', array(
      'title'=>$title,
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function button(string $link, string $text, array $options = []) {
    $this->add('button', array(
      'link'=>$link,
      'text'=>$text,
      'options'=>$options
    ));
    return $this;
  }

  public function image(string $content, array $options = []) {
    $this->add('image', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function link(string $link, string $text, array $options = []) {
    $this->add('link', array(
      'link'=>$link,
      'text'=>$text,
      'options'=>$options
    ));
    return $this;
  }

  public function list(array $content, array $options = []) {
    $this->add('list', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function text(string $content, array $options = []) {
    $this->add('text', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function title(string $content, array $options = []) {
    $this->add('title', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function code(string $content, array $options = []) {
    $this->add('code', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function card(string $content, array $options = []) {
    $this->add('card', array(
      'content'=>$content,
      'options'=>$options
    ));
    return $this;
  }

  public function beginGrid($col) {
    if(!isset($this->current_grid)) {
      $grid = new PHPGrid($col);
      $this->current_grid = $grid;
    }
    return $this;
  }

  public function beginRow($bordered = false) {
    if(isset($this->current_grid) && !$this->current_grid->hasCurrentRow()) {
      $this->current_grid->beginRow();

      if($bordered) {
        $this->current_grid->getCurrentRow()->bordered();
      }
    }
    return $this;
  }

  public function endRow() {
    if(isset($this->current_grid) && $this->current_grid->hasCurrentRow()) {
      $this->current_grid->endRow();
    }
    return $this;
  }

  public function endGrid() {
    if(isset($this->current_grid)) {
      $this->add($this->current_grid);
      $this->current_grid = null;
    }
    return $this;
  }

}
