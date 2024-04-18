<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Events extends \ArrayObject
{
  public function __construct(protected array $equipments = [])
  {
    $this->equipments = $equipments;
  }

  public function offsetSet($index, $newval): void
  {
    if (!($newval instanceof Event)) {
      throw new \InvalidArgumentException("Must be a event");
    }
    parent::offsetSet($index, $newval);
  }

  // public static function getEquipments(int $idEquipment): Equipments
  // {
  //     $liste = new Equipments();
  //     $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Event where id=:id;');
  //     $statement->execute(['numEquipment' => $idEquipment]);
  //     while ($row = $statement->fetch()) {
  //         $liste[] = new Equipment(id: $row['id'], name: $row['name']);
  //     }
  //     return $liste;
  // }
}
