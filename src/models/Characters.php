<?php

declare(strict_types=1);

namespace App\Guild;

class Characters extends \ArrayObject
{
    public function __construct(protected array $characters = [])
    {
        $this->characters = $characters;
    }

    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Character)) {
            throw new \InvalidArgumentException("Must be a character");
        }
        parent::offsetSet($index, $newval);
    }

    public static function getCharacters(int $idCharacter): Characters
    {
        $liste = new Characters();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Character where numCharacter=:numCharacter;');
        $statement->execute(['numCharacter' => $idCharacter]);
        while ($row = $statement->fetch()) {
            $liste[] = new Character(id: $row['nickname'], archetype: $row['archetype'], level: $row['level']);
        }
        return $liste;
    }
}
