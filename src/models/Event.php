<?

declare(strict_types=1);

namespace App\Guild\Models;

class Event
{
  /**
   * Simple class with accessors.
   */
  public function __construct(private \DateTimeImmutable $date = new \DateTimeImmutable(), private User $organizer, private Area $area, private Equipment $equipment, private Characters $participants = new Characters(), private int $levelMinimum = 1, private int $levelMaximum = 1, private int $id = 0)
  {
    $this->id = $id;
    $this->date = $date;
    $this->organizer = $organizer;
    $this->area = $area;
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

  public function getArea(): Area
  {
    return $this->area;
  }

  public function setArea(Area $area): void
  {
    $this->area = $area;
  }

  public function addNewParticipant(Character $character): void
  {
    if (!self::isCharacterPresent($character))
      $this->participants[] = $character;
    else
      throw new \InvalidArgumentException('This participant has already subscribed to this event!');
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
  public function getEquipment(): Equipment
  {
    return $this->equipment;
  }
  // getListParticipants (avec appel SQL)
  public static function listEvents(): \ArrayObject
  {
    /**
     * READ SQL request.
     */
    $list = new \ArrayObject();
    $stmt = Database::getInstance()->getConnexion()->prepare('select * from Event');
    $stmt->execute();
    while ($row = $stmt->fetch()) {
      $area = Area::read($row['numArea']); //TODO!!!
      $organizer = User::read($row['numUser']);
      $equipment = Equipment::read($row['numEquipment']);
      $list[] = new Event(id: $row['id'], organizer: $organizer, area: $area, levelMinimum: $row['levelMinimum'], levelMaximum: $row['levelMaximum'], equipment: $equipment);
    }

    return $list;
  }

  public static function createEvent(Event $event): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('INSERT INTO Event (date, organizer, numUser, numArea, levelMinimum, levelMaximum) values (:date, :organizer, :numArea, :numUser, :levelMinimum, :levelMaximum, :numCharacter);');
    $stmt->execute(['date' => $event->getDate(), 'organizer' => $event->getOrganizer()->getId(), 'numArea' => $event->getArea()->getId(), 'levelMinimum' => $event->getLevelMinimum(), 'levelMaximum' => $event->getLevelMaximum()]);
  }

  public static function updateEvent(Event $event, string $field): void
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('UPDATE event set date = :date, numUser = :numUser, numEquipment = :numEquipment, levelMinimum = :levelMinimum, levelMaximum = :levelMaximum WHERE id = :id');
    $stmt->execute(['id' => $event->getId(), 'date' => $event->getDate(), 'numUser' => $event->getOrganizer(), 'numEquipement' => $event->getEquipment()->getId(), 'levelMinimum' => $event->getLevelMinimum(), $event->getLevelMaximum()]);
  }

  public function isCharacterPresent(Character $character): bool
  {
    $stmt = Database::getInstance()->getConnexion()->prepare('SELECT count(*) as countPresents FROM Participates WHERE numCharacter = :numCharacter AND numEvent = :numEvent');
    $stmt->execute(['numCharacter' => $character->getId(), 'numEvent' => $this->id]);

    while ($row = $stmt->fetch()) {
      if ($row['countPresents'] == 1) {
        return true;
      }
    }
    return false;
  }
}
