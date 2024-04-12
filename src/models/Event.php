<?

declare(strict_types=1);

namespace Entities\Guild;

class Event
{
  /**
   * Simple class with accessors.
   */
  public function __construct(private \DateTimeImmutable $date = new \DateTimeImmutable(), private User $organizer, private Areas $areas, private Characters $participants, private int $levelMinimum = 1, private int $levelMaximum, private int $id = 0)
  {
    $this->id = $id;
    $this->date = $date;
    $this->organizer = $organizer;
    $this->areas = $areas;
    $this->levelMinimum = $levelMinimum;
    $this->levelMaximum = $levelMaximum;
    $this->participants = $participants;
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

  public function getOrganizer(): User
  {
    return $this->organizer;
  }

  public function setOrganizer(string $organizer): void
  {
    $this->organizer = $organizer;
  }

  public function getAreas(): Areas
  {
    return $this->areas;
  }

  public function setAreas(string $location): void
  {
    // TODO!!!
    // $this->location = $location;
  }

  public function addNewParticipant(User $user): void
  {
    if (!in_array($user, $this->participants))
      throw new \InvalidArgumentException('This participant has already subscribed to this event!');

    $this->participants[] = $user;
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

  public static function listEvents(): \ArrayObject
  {
    /**
     * READ SQL request.
     */
    $list = new \ArrayObject();
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Event');
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      $list[] = new Event(id: $row['id'], users: $row['users'], location: $row['location'], levelMinimum: $row['levelMinimum'], levelMaximum: $row['levelMaximum']);
    }

    return $list;
  }

  public static function createEvent(Event $event): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('INSERT INTO Event (date, users, location, levelMinimum, levelMaximum) values (:date, :users, :location, :levelMinimum, :levelMaximum);');
    $stmt->execute(['date' => $event->getDate(), '']);
  }

  public static function updateEvent(Event $event, string $field): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('UPDATE event set date = :date, numUser = :numUser, numEquipment = :numEquipment, levelMinimum = :levelMinimum, levelMaximum = :levelMaximum WHERE id = :id');
    $stmt->execute(['id' => $event->getId(), 'date' => $event->getDate(), 'numUser' => $event->getUser(), 'numEquipement' => getEquipement(), 'levelMinimum' => $event->getLevelMinimum(), $event->getLevelMaximum()]);
  }
}
