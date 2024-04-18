<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Equipment
{
    public function __construct(private int $id = 0, private string $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
