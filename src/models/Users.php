<?php

declare(strict_types=1);

namespace Entities\Guild;

class Users extends \ArrayObject
{
  public function __construct(protected array $users = [])
  {
    $this->users = $users;
  }

  public function offsetSet($index, $newval): void
  {
    if (!($newval instanceof User)) {
      throw new \InvalidArgumentException("Must be a user");
    }
    parent::offsetSet($index, $newval);
  }

  public static function getUsers(int $idUser): Users
  {
    $liste = new Users();
    $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM User where numUser=:numUser;');
    $statement->execute(['numUser' => $idUser]);
    while ($row = $statement->fetch()) {
      $liste[] = new User(nickname: $row['nickname'], id: $row['id'], email: $row['email'], fname: $row['fname'], lname: $row['lname'], birthdate: $row['birthdate']);
    }
    return $liste;
  }
}
