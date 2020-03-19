<?php

namespace PHPresentation\Utils;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\TwigFilter;
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
        $filter = new TwigFilter('gettype', function ($object) {
            return gettype($object);
        });
        self::$environment->addFilter($filter);
    }

    return self::$environment;
  }
}
