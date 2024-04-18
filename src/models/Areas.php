<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Areas extends \ArrayObject
{
    public function __construct(protected array $areas = [])
    {
        $this->areas = $areas;
    }

    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Area)) {
            throw new \InvalidArgumentException("Must be a area");
        }
        parent::offsetSet($index, $newval);
    }

    public static function getAreas(int $idArea): Areas
    {
        $liste = new Areas();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Area where numArea=:numArea;');
        $statement->execute(['numArea' => $idArea]);
        while ($row = $statement->fetch()) {
            $liste[] = new Area(id: $row['id'], name: $row['name'], instance: $row['instance']);
        }
        return $liste;
    }
}
