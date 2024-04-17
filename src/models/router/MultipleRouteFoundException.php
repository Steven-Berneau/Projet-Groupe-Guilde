<?php

declare(strict_types=1);

namespace app\quizz\router;

class MultipleRouteFoundException extends \Exception
{
  public function __construct($message = 'More than one route has been found.')
  {
    parent::__construct($message, 1);
  }
}
