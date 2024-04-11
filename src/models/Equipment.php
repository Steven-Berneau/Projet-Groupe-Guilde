<?

declare(strict_types=1);

namespace Entities\Guild;

class Equipment
{
    private int $id;
    private string $name;
    private string $description;
    private int $requiredLevel;

    public function __construct(int $id, string $name)
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
