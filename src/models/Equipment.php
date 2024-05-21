<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Equipment
{
    public function __construct(private int $id = 0, private string $name = "")
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public static function read(int $id): ?Equipment
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Equipment WHERE id=:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            return new Equipment(id: $row['id'], name: $row['gear']);
        }
        return null;
    }

    public static function create(Equipment $equipment): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare('INSERT INTO Equipment (name) VALUES (:name);');
        $statement->execute(['name' => $equipment->getName()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function update(Equipment $equipment)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Equipment SET name=:name WHERE id=:id;');
        $statement->execute(['name' => $equipment->getName()]);
    }

    public static function delete(Equipment $equipment)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Equipment WHERE id=:id');
        $statement->execute(['id' => $equipment->getId()]);
    }
}
