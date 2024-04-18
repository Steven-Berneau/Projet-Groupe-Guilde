<?php

declare(strict_types=1);

namespace app\quizz\router;

class ViewNotFoundException extends \Exception
{
  public function __construct($viewFile, $message = 'View was not found')
  {
    parent::__construct($message . ': ' . $viewFile, 1);
  }
}
