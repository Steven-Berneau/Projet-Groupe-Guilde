<?

declare(strict_types=1);

namespace Entities\Guild;

class Event
{
  public function __construct(private int $id = 0, private \DateTimeImmutable $date = new \DateTimeImmutable(), private $users = new \ArrayObject(), private string $location, private int $levelMinimum = 1, private int $levelMaximum)
  {
    $this->id = $id;
    $this->date = $date;
    $this->users = $users;
    $this->location = $location;
    $this->levelMinimum = $levelMinimum;
    $this->levelMaximum = $levelMaximum;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getDate(): \DateTimeImmutable
  {
    return $this->date;
  }

  public function getUsers(): \ArrayObject
  {
    return $this->users;
  }

  public function getLocation(): string
  {
    return $this->location;
  }

  public function getLevelMinimum(): int
  {
    return $this->levelMinimum;
  }

  public function getLevelMaximum(): int
  {
    return $this->levelMaximum;
  }
}
