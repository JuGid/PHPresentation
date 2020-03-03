<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPresentation\PHPSection;

final class PHPSectionTest extends TestCase
{

  /**
  * @before
  */
  public function testConstructor(): void
  {
    $this->assertInstanceOf(PHPSection::class, new PHPSection('Test'));
  }

  /**
   * depends testConstructor
   */
  public function testNameIsSet()
  {
    $section = new PHPSection('Nouvelle section');
    $this->assertEquals($section->getName(), 'Nouvelle section');
  }

}
