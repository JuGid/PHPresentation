<?php

namespace PHPresentation\Utils\Errors;

interface Handler {
  public function handle($exception);
}
