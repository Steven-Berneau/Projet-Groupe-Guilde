<?php

declare(strict_types=1);

namespace Entities\Guild;

class Ranks extends \ArrayObject
{
    public function __construct(protected array $ranks = [])
    {
        $this->ranks = $ranks;
    }

    public function offsetSet($index, $newval): void
    {
        if (!($newval instanceof Rank)) {
            throw new \InvalidArgumentException("Must be a rank");
        }
        parent::offsetSet($index, $newval);
    }

    public static function getRanks(int $idRank): Ranks
    {
        $liste = new Ranks();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Rank where numRank=:numRank;');
        $statement->execute(['numRank' => $idRank]);
        while ($row = $statement->fetch()) {
            $liste[] = new Rank(id: $row['id'], name: $row['name']);
        }
        return $liste;
    }
}
