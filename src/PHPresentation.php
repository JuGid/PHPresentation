<?php

namespace PHPresentation;

use PHPresentation\Utils\Template;
use PHPresentation\PHPSection;

class PHPresentation
{
  /**
  * @var string
  */
  private $name;

  /**
  * @var string
  */
  private $author;

  /**
  * @var string
  */
  private $version;

  /**
  * @var Template
  */
  private $template;

  /**
  * @var array
  */
  private $sections;

  public function __construct() {
    $this->template(new Template('core/base.html.twig'));
  }

  public function init() {
    $content_summary = [];
    $nbSections = count($this->getSections());
    for($i = 0; $i < $nbSections; $i++) {
      if(!empty($this->getSection($i)->getName())) {
        $content_summary[] = $this->getSection($i)->getName();
      }
    }

    $flyleaf = new PHPSection("");
    $flyleaf->createSlide()
            ->contentCentered()
            ->textCentered()
            ->title($this->getName())
            ->text('by '.$this->getAuthor())
            ->text('v'.$this->getVersion());

    $summary = new PHPSection('Summary');
    $summary->createSlide()
            ->list($content_summary);

    $this->addSectionFirst($summary);
    $this->addSectionFirst($flyleaf);
  }

  public function name($name)
  {
    $this->name = $name;
  }

  public function template($template)
  {
    $this->template = $template;
  }

  public function version($major, $minor, $build)
  {
    $this->version = $major.'.'.$minor.'.'.$build;
  }

  public function author(string $author)
  {
    $this->author = $author;
  }

  public function addSection($section)
  {
    $this->sections[] = $section;
  }

  public function addSections(array $sections)
  {
    array_push($this->sections, $sections);
  }

  public function addSectionFirst($section) {
    array_unshift($this->sections, $section);
  }

  public function setSections(array $sections) {
    $this->sections = $sections;
  }

  public function getSections() {
    return $this->sections;
  }

  public function getSection($index) {
    return $this->sections[$index];
  }

  public function countSections() {
    return count($this->sections);
  }

  public function has($index) {
    return isset($this->sections[$index]);
  }

  public function getName()
  {
    return $this->name;
  }

  public function getTemplate()
  {
    return $this->template;
  }

  public function getVersion()
  {
    return $this->version;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getInformation() {
    return array(
      'author'=>$this->getAuthor(),
      'version'=>$this->getVersion(),
      'name'=>$this->getName()
    );
  }

  public function createSection($name, string $description="") {
    $section_name = new PHPSection();
    $section_name->createSlide()
            ->contentCentered()
            ->title($name);
    if(!empty($description)) {
      $section_name->lastSlide()
                   ->text($description);
    }
    $this->addSection($section_name);

    $section = new PHPSection($name);
    $this->addSection($section);
    return $section;
  }

  public function last() {
    return end($this->sections);
  }

  public function pages() {
    $nbPages = 0;
    foreach($this->getSections() as $section) {
      $nbPages+=$section->slides();
    }
    return $nbPages;
  }

}
