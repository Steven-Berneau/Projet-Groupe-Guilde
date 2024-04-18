<?php

declare(strict_types=1);

namespace App\Guild\Models;

class InstanceType
{
  public function __construct(private int $id = 0, private string $description = "")
  {
    $this->id = $id;
    $this->description = $description;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription(string $desc): void
  {
    if (strlen($desc) < 3) {
      throw new \InvalidArgumentException("Description's name must be at least 3 characters long!");
    }
    $this->description = $desc;
  }
  public static function read(int $id): ?InstanceType
  {
    $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Instance_type WHERE id=:id;');
    $statement->execute(['id' => $id]);
    if ($row = $statement->fetch()) {
      return new InstanceType(id: $row['id'], description: $row['description']);
    }
    return null;
  }
}
