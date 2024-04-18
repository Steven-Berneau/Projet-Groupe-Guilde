<?php

declare(strict_types=1);

namespace App\Guild;

class API_key
{
    /**
     * First pass with accesors
     */
    public function __construct(private int $id = 0, private string $api_key)
    {
        $this->id = $id;
        $this->api_key = $api_key;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getApi_key(): string
    {
        return $this->api_key;
    }

    public function setApi_key(string $api_key)
    {
        return $this->api_key = $api_key;
    }
}
