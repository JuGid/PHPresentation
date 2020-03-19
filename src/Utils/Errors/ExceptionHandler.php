<?php

namespace PHPresentation\Utils\Errors;

use PHPresentation\Utils\Errors\Handler;
use PHPresentation\Utils\Template;

/**
* @author Julien GIDEL
*/
class ExceptionHandler implements Handler {

  public function template() {
    return true;
  }

  public function handle($exception) {
    $template = new Template('core/exception_handler.html.twig');

    $template->setData([
      'exception'=>$exception,
    ]);

    echo $template->render();
  }
}
