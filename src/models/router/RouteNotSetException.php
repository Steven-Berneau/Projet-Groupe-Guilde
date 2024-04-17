<?php

declare(strict_types=1);

namespace app\quizz\router;

class RouteNotSetException extends \Exception
{
  public function __construct($message = 'Route not set!')
  {
    parent::__construct($message, 1);
  }
}
