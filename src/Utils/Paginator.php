<?php

namespace PHPresentation\Utils;

use PHPresentation\Utils\Renderable;
use PHPresentation\PHPSection;

class Paginator implements Renderable
{
  private $presentation;

  private static $i_section;

  private static $i_slide;

  public function __construct($presentation) {
    $this->presentation = $presentation;
    $this->i_section = 0;
    $this->i_slide = 0;
    $this->createFirstSlides();
  }

  private function createFirstSlides() {
    $content_summary = [];
    $nbSections = count($this->presentation->getSections());
    for($i = 1; $i < $nbSections; $i++) {
      $content_summary[] = $this->presentation->getSection($i)->getName();
    }

    $content_flyleaf = $this->presentation->getName().' par '.$this->presentation->getAuthor();

    $flyleaf = new PHPSection("");
    $flyleaf->createSlide()
            ->title($this->presentation->getName())
            ->text($content_flyleaf)
            ->text('v'.$this->presentation->getVersion());

    $summary = new PHPSection('Sommaire');
    $summary->createSlide()
            ->list($content_summary);

    $this->presentation->addSectionFirst($summary);
    $this->presentation->addSectionFirst($flyleaf);
  }

  private function getPaginationArray() {
    $section = $this->presentation->getSection($this->i_section);
    $for_next = array();

    $for_next['nextSection'] = $this->i_section;
    $for_next['nextSlide'] = $this->i_slide;
    $for_next['prevSection'] = $this->i_section;
    $for_next['prevSlide'] = $this->i_slide;

    if(!$section->has($this->i_slide + 1)) {
      if($this->presentation->has($this->i_section + 1)) {
        $for_next['nextSection'] = $this->i_section + 1;
        $for_next['nextSlide'] = $this->presentation->getSection($this->i_section + 1)->first();
      }
    } else {
      $for_next['nextSlide'] = $this->i_slide + 1;
    }

    if($this->i_slide > 0) {
      $for_next['prevSlide'] = $this->i_slide - 1;
    } else {
      if($this->i_section > 0) {
        $for_next['prevSection'] = $this->i_section - 1;
        $for_next['prevSlide'] = $this->presentation->getSection($this->i_section - 1)->last();
      }
    }

    return $for_next;
  }

  private function getCurrentNumberPage() {
    $pages = 0;
    for($i = 0; $i < $this->i_section; $i++) {
      $pages+=$this->presentation->getSection($i)->slides();
    }

    $pages+= $this->i_slide + 1;
    return $pages;
  }

  public function render()
  {
    if(isset($_GET['se']) && isset($_GET['sl'])) {
      $this->i_section = $_GET['se'];
      $this->i_slide = $_GET['sl'];
    }

    if(null === $this->presentation->getTemplate()) {
      throw new \Exception('You have to set a template before rendering the presentation.');
    }

    $array_views_components = [];
    $array_views_components['components'] = $this->presentation->getSection($this->i_section)->render($this->i_slide);
    $array_views_components['pages'] = $this->presentation->pages();
    $array_views_components['page'] = $this->getCurrentNumberPage();
    $array_views_components['pagination'] = $this->getPaginationArray();
    $array_views_components['information'] = $this->presentation->getInformation();
    $array_views_components['section'] = $this->presentation->getSection($this->i_section)->getName();
    $this->presentation->getTemplate()->setData($array_views_components);

    echo $this->presentation->getTemplate()->render();
  }

}
