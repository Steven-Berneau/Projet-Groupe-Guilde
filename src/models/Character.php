<?

declare(strict_types=1);

namespace App\Guild\Models;

class Character
{

    public function __construct(private int $id = 0, private string $archetype = "", private int $level = 1, private Events $events = new Events())
    {
        $this->id = $id;
        $this->archetype = $archetype;
        $this->level = $level;
        $this->events = $events;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getArchetype(): string
    {
        return $this->archetype;
    }

    public function setArchetype(string $archetype)
    {
        return $this->archetype = $archetype;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function setLevel(int $level)
    {
        return $this->level = $level;
    }

    public function getEvent()
    {
        return $this->events;
    }

    public function setEvent(string $events)
    {
        return $this->events = $events;
    }

    public function addNewEvent(Event $event): void
    {
        if (!self::isEventCreated($event))
            $this->events[] = $event;
        else
            throw new \InvalidArgumentException('This event already exists!');
    }

    public function getListEvents(): Events
    {
        $list = new Events();
        $stmt = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Event, Participates where numCharacter=:numCharacter and numEvent = Event.id;');
        $stmt->execute(['numCharacter' => $this->id]);
        while ($row = $stmt->fetch()) {
            $organizer = User::read($row['numUser']);
            $area = Area::read($row['numArea']);
            $equipment = Equipment::read($row['numEquipment']);
            $list[] = new Event(id: $row['id'], date: $row['date'], organizer: $organizer, area: $area, levelMinimum: $row['levelMinimum'], levelMaximum: $row['levelMaximum'], equipment: $equipment);
        }
        return $list;
    }


    public function isEventCreated(Event $event): bool
    {
        $stmt = Database::getInstance()->getConnexion()->prepare('SELECT count(*) as countPresents FROM Participates WHERE numEvent =:numEvent and numCharacter =:numCharacter');
        $stmt->execute(['numEvent' => $event->getId(), 'numCharacter' => $this->id]);
        while ($row = $stmt->fetch()) {
            if ($row['countPresents'] == 1) {
                return true;
            }
        }
        return false;
    }
}
