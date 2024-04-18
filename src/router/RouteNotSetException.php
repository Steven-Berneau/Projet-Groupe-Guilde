<?php

declare(strict_types=1);

namespace App\Guild\Router;

class RouteNotSetException extends \Exception
{
  public function __construct($message = 'Route not set!')
  {
    parent::__construct($message, 1);
  }
}
