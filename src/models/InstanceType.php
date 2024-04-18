<?php

declare(strict_types=1);

namespace App\Guild;

class Instance_type
{
  public function __construct(private int $id = 0, private string $description = "")
  {
    $this->id = $id;
    $this->description = $description;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription(string $desc): void
  {
    if (strlen($desc) < 3) {
      throw new \InvalidArgumentException("Description's name must be at least 3 characters long!");
    }
    $this->description = $desc;
  }
}
