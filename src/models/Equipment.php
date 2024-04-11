<?
declare(strict_types=1);

namespace Entities\Guild;

class Equipment
{
    private int $id;
    private string $name;
    private string $description;
    private int $requiredLevel;

    public function __construct(int $id, string $name, string $description, int $requiredLevel)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->requiredLevel = $requiredLevel;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRequiredLevel(): int
    {
        return $this->requiredLevel;
    }
}