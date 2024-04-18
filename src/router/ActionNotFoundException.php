<?php

declare(strict_types=1);

namespace App\Guild\Router;

class ActionNotFoundException extends \Exception
{
  public function __construct($message = 'Action not found')
  {
    parent::__construct($message, 1);
  }
}
