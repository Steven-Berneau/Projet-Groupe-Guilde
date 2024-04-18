<?php

declare(strict_types=1);

namespace App\Guild\Router;

class ControllerNotFoundException extends \Exception
{
  public function __construct($message = 'Controller not found')
  {
    parent::__construct($message, 1);
  }
}
