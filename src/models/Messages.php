<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Messages extends \ArrayObject
{
  public function __construct(protected array $characters = [])
  {
    $this->characters = $characters;
  }

  public function offsetSet($index, $newVal): void
  {
    if (!($newVal instanceof Message)) {
      throw new \InvalidArgumentException("Must be a message!");
    }
  }
}
