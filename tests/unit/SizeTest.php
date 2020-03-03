<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPresentation\Utils\Size;

final class SizeTest extends TestCase
{

  public function testConstructor()
  {
    $this->assertInstanceOf(Size::class, new Size());
    $this->assertInstanceOf(Size::class, new Size(6,6));
  }

  /**
  * @depends testConstructor
  */
  public function testGetColSize()
  {
    $size = new Size();
    $this->assertEquals($size->getColSize(), 1);
    $this->assertEquals($size->getRowSize(), 1);
    $size_other = new Size(6,5);
    $this->assertEquals($size_other->getColSize(), 5);
    $this->assertEquals($size_other->getRowSize(), 6);
  }

  /**
  * @depends testConstructor
  */
  public function testSetSize()
  {
    $size = new Size();
    $size->setSize(3,4);
    $this->assertEquals($size->getColSize(), 4);
    $this->assertEquals($size->getRowSize(), 3);
  }

}
