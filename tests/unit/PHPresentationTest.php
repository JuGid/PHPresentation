<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPresentation\PHPresentation;

final class PHPresentationTest extends TestCase
{

  /**
  * @before
  */
  public function testConstructor(): void
  {
    $this->assertInstanceOf(PHPresentation::class, new PHPresentation());
  }

  /**
   * depends testConstructor
   */
  public function testNameIsSet()
  {
    $presentation = new PHPresentation();
    $presentation->name('Presentation test');
    $this->assertEquals($presentation->getName(), 'Presentation test');
  }

  /**
   * depends testConstructor
   */
  public function testVersionIsSet()
  {
    $presentation = new PHPresentation();
    $presentation->version(0,0,10);
    $this->assertEquals($presentation->getVersion(), '0.0.10');
  }

  /**
   * depends testConstructor
   */
  public function testAuthorIsSet()
  {
    $presentation = new PHPresentation();
    $presentation->author('Julien Gidel');
    $this->assertEquals($presentation->getAuthor(), 'Julien Gidel');
  }

}
