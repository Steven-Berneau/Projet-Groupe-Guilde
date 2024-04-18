<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Rank
{
  public function __construct(private int $id = 0, private string $name = "")
  {
    $this->name = $name;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    if (strlen($name) < 3) {
      throw new \InvalidArgumentException("Rank's name must be at least 3 characters long!");
    }
    $this->name = $name;
  }
}
