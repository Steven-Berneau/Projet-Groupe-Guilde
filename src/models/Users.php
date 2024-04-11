<?php

declare(strict_types=1);

namespace Entities\Guild;

class Users extends \ArrayObject
{
  public function __construct(protected array $users = [])
  {
    $this->users = $users;
  }
}
