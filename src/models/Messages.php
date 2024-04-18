<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Messages extends \ArrayObject
{
  public function __construct(protected array $characters = [])
  {
    $this->characters = $characters;
  }

  public function offsetSet($index, $newVal): void
  {
    if (!($newVal instanceof Message)) {
      throw new \InvalidArgumentException("Must be a message!");
    }
    parent::offsetSet($index, $newVal);
  }

  public static function getMessages(int $idMessage): Messages
  {
    $list = new Messages();
    $stmt = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Message where numMessage = :numMessage;');
    $stmt->execute(['numMessage' => $idMessage]);
    while ($row = $stmt->fetch()) {
      $list[] = new Message(id: $row['id'], title: $row['title'], contents: $row['contents'], date: $row['date']);
    }

    return $list;
  }
}

// Do I have to insert id within new Message() at line 28? YYYESSSS!!
// Do I have to insert foreign key from User? And if so, how to proceed?
// Where is lastInsertId() method's implementation ? (from Question.php in quiz project) inherits from PDO
// How to insert sender and addressee foreign key into Message::create() ? (Message.php)

// AgendaController
// ProfileController
// MessageController