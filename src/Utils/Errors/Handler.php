<?php

namespace PHPresentation\Utils\Errors;

interface Handler {
  public function template();
  public function handle($exception);
}
