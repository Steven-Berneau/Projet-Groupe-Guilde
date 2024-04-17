<?php

declare(strict_types=1);

namespace app\quizz\router;

class ActionNotFoundException extends \Exception
{
  public function __construct($message = 'Action not found')
  {
    parent::__construct($message, 1);
  }
}
