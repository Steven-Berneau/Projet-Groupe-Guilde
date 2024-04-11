<?php

declare(strict_types=1);

namespace Entities\Guild;

class Area
{
  public function __construct(private int $id = 0, private string $name = "", protected Instance_type $instance = new Instance_type())
  {
    /**
     * Using dependency injection
     */
    $this->id = $id;
    $this->name = $name;
    $this->instance = $instance;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): void
  {
    if (strlen($name) < 3) {
      throw new \InvalidArgumentException("Area's name must be at last 3 characters long!");
    }
    $this->name = $name;
  }
}
