<?

declare(strict_types=1);

namespace Entities\Guild;

class Event
{
  public function __construct(private int $id = 0, private \DateTimeImmutable $date = new \DateTimeImmutable(), private $users = [], private string $location, private int $levelMinimum = 1, private int $levelMaximum)
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

  public function setDate(string $frenchDate, ?\DateTimeZone $hour): void
  {
    /**
     * French date format: day/month/year
     */
    $this->date = \DateTimeImmutable::createFromFormat('d/m/Y H:i', $frenchDate, $hour);
  }

  public function getUsers(): array
  {
    /**
     * Using User collection.
     */
    return $this->users;
  }

  public function addNewParticipant(string $user): void
  {
    if (in_array($user, $this->users)) {
      echo 'This participant has already subscribed to this event!', PHP_EOL;
    } else {
      $this->users[] = $user;
    }
  }

  public function getLocation(): string
  {
    return $this->location;
  }

  public function setLocation(string $location): void
  {
    $this->location = $location;
  }

  public function getLevelMinimum(): int
  {
    return $this->levelMinimum;
  }

  public function setLevelMinimum(int $level): void
  {
    if ($this->levelMinimum >= $this->levelMaximum) {
      echo 'Please enter a minimum level inferior to maximum level!', PHP_EOL;
    } else {
      $this->levelMinimum = $level;
    }
  }

  public function getLevelMaximum(): int
  {
    if ($this->levelMaximum <= $this->levelMinimum) {
      echo 'Please enter a maximum level superior to minimum level!', PHP_EOL;
    } else {
      return $this->levelMaximum;
    }
  }
}
