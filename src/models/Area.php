<?php

declare(strict_types=1);

namespace App\Guild;

class Area
{
  public function __construct(private int $id = 0, private string $name = "", protected InstanceType $instance = new InstanceType())
  {
    $this->id = $id;
    $this->name = $name;
    $this->instance = $instance;
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
      throw new \InvalidArgumentException("Area's name must be at last 3 characters long!");
    }
    $this->name = $name;
  }
  public static function read(int $id): ?Area
  {
    $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Area WHERE id=:id;');
    $statement->execute(['id' => $id]);
    if ($row = $statement->fetch()) {
      $instanceType = InstanceType::read($row['numDescription']);
      return new Area(id: $row['id'], name: $row['name'], instance: $instanceType);
    }
  }
}
