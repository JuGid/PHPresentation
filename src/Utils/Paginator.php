<?php

namespace PHPresentation\Utils;

use PHPresentation\Utils\Renderable;
use PHPresentation\Utils\Errors\ExceptionHandler;

/**
* Get the section and slide to render and render it.
* The paginator only paginate. The render function is used to gather
* information and set it to the presentation template.
* @author Julien GIDEL
*/
class Paginator implements Renderable
{
  private $presentation;

  private $i_section;

  private $i_slide;

  public function __construct($presentation) {
    $this->presentation = $presentation;
    $this->presentation->init();
    $this->i_section = 0;
    $this->i_slide = 0;
  }

  //Sure, it can be surely improved
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

    set_exception_handler([new ExceptionHandler(), 'handle']);

    if(isset($_GET['se']) && isset($_GET['sl'])) {
      $this->i_section = $_GET['se'];
      $this->i_slide = $_GET['sl'];
    }

    if(null === $this->presentation) {
      throw new \Exception('Presentation is NULL, please provider an instanciated one.');
    }

    if(null === $this->presentation->getTemplate()) {
      throw new \Exception('You have to set a template before rendering the presentation.');
    }

    $current_section = $this->presentation->getSection($this->i_section);
    $current_slide = $current_section->getSlide($this->i_slide);

    $this->presentation->getTemplate()->setData(array(
      'components'=>$current_section->render($this->i_slide),
      'contentCentered'=>$current_slide->isContentCentered(),
      'textCentered'=>$current_slide->isTextCentered(),
      'pages'=>$this->presentation->pages(),
      'page'=>$this->getCurrentNumberPage(),
      'pagination'=>$this->getPaginationArray(),
      'information'=>$this->presentation->getInformation(),
      'section'=>$current_section->getName(),
      'showFooter'=>$current_slide->showFooter()
    ));

    echo $this->presentation->getTemplate()->render();
  }

}
