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

  public function createSection($name) {
    $section = new PHPSection($name);
    $section->createSlide()
            ->contentCentered()
            ->title($name);
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
