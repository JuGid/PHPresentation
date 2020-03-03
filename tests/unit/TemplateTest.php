<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPresentation\Utils\Template;

final class TemplateTest extends TestCase
{

  public function testConstructor(): void
  {
    $this->assertInstanceOf(Template::class, new Template('path/to/file'));
  }

  /**
  * @depends testConstructor
  */
  public function testGetDataAfterSettingIt() : void
  {
    $template = new Template('path/to/template');
    $data = array(
      'content'=>'This is a content',
      'title'=>'This is a title'
    );
    $template->setData($data);
    $this->assertEquals($template->getData(), $data);
  }

  /**
  * @depends testConstructor
  */
  public function testAccessDataWithoutException() : void
  {
    $template = new Template('path/to/template');
    $data = array(
      'content'=>'This is a content',
      'title'=>'This is a title'
    );
    $template->setData($data);
    $this->assertEquals($template->access(0), $data[0]);
  }

  /**
  * @depends testConstructor
  */
  public function testAccessDataAfterSettingIt() : void
  {
    $this->expectException(\OutOfRangeException::class);

    $template = new Template('path/to/template');
    $data = array(
      'content'=>'This is a content',
      'title'=>'This is a title'
    );
    $template->setData($data);
    $template->access(3);
  }

}
