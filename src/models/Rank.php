<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Rank
{
  public function __construct(private int $id = 0, private string $name = "")
  {
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

  public function setName(string $name): void
  {
    if (strlen($name) < 3) {
      throw new \InvalidArgumentException("Rank's name must be at least 3 characters long!");
    }
    $this->name = $name;
  }

  // Starting CRUD

  public static function read(int $id): ?Rank
  {
    $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Rank WHERE id=:id;');
    $statement->execute(['id' => $id]);
    if ($row = $statement->fetch())
      return new Rank(id: $row['id'], name: $row['name']);
    return NULL;
  }

  public static function create(Rank $rank): string
  {
    $statement = Database::getInstance()->getConnexion()->prepare('INSERT INTO Rank (name) VALUES (:name);');
    $statement->execute(['name' => $rank->getName()]);
    return (string)Database::getInstance()->getConnexion()->lastInsertId();
  }

  public static function update(Rank $rank)
  {
    $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Rank SET name=:name WHERE id=:id;');
    $statement->execute((['name' => $rank->getName()]));
  }

  public static function delete(Rank $rank)
  {
    $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Rank WHERE id=:id;');
    $statement->execute(['id' => $rank->getId()]);
  }
}
