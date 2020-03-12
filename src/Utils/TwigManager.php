<?php

namespace PHPresentation\Utils;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
* Used to manage Twig rendering and loading
* @author Julien GIDEL
*/
class TwigManager
{
  private static $loader;

  private static $environment;

  public static function getTwig()
  {
      if (self::$loader === null) {
          self::$loader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'].'/src/templates');
          self::$environment = new Environment(self::$loader);
      }

      return self::$environment;
  }
}
