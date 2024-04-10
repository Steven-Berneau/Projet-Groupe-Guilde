<?

declare(strict_types=1);

namespace Entities\Guild;

class Event
{
  public function __construct(private int $id = 0, private \DateTimeImmutable $date, private $Users = new \ArrayObject(), private string $location)
  {
    $this->id = $id;
  }
}
