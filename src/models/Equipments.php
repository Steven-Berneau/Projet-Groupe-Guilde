<?php

declare(strict_types=1);

namespace Entities\Guild;

class Equipments extends \ArrayObject
{
    public function __construct(protected array $equipments = [])
    {
        $this->equipments = $equipments;
    }

    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Equipment)) {
            throw new \InvalidArgumentException("Must be a equipment");
        }
        parent::offsetSet($index, $newval);
    }

    public static function getEquipments(int $idEquipment): Equipments
    {
        $liste = new Equipments();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Equipment where numEquipment=:numEquipment;');
        $statement->execute(['numEquipment' => $idEquipment]);
        while ($row = $statement->fetch()) {
            $liste[] = new Equipment(id: $row['id'], name: $row['name']);
        }
        return $liste;
    }
}
