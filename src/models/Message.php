<?php

declare(strict_types=1);

namespace App\Guild\Models;

class Message
{
    public function __construct(private int $id = 0, private string $title = '', private string $contents = '', private string $sender = '', private string $adressee = '', private \DateTimeImmutable $date = new \DateTimeImmutable('now'))
    {
        $this->id = $id; // Attribution de la valeur de $id à la propriété $id de l'objet
        $this->contents = $contents; // Attribution de la valeur de $content à la propriété $content de l'objet
        $this->title = $title;
        // Attribution de la valeur de $date à la propriété $date de l'objet
        // Si $date est null, une nouvelle instance de DateTimeImmutable est créée avec la date et l'heure actuelles
        $this->date = $date ?: new \DateTimeImmutable(); //test
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContents(): string
    {
        return $this->contents;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function getSender(): string
    {
        return $this->sender;
    }

    public function getAdressee(): string
    {
        return $this->adressee;
    }

    public static function create(Message $message, User $sender): int
    {
        // $stmt = Database::getInstance()->getConnexion()->prepare('INSERT INTO Message (title, contents, date, addressee.sended ') values (:sender);

        // ['sender'=>$sender->getId()]
    }

    // public static function create (Question $question,Quizz $quizz):int
    // {
    //     $statement=Database::getInstance()->getConnexion()->prepare("INSERT INTO question (text,numQuiz) values (:text,:numQuiz);");
    //     $statement->execute(['text'=>$question->getText(),'numQuiz'=>$quizz->getId()]);
    //     return (int)Database::getInstance()->getConnexion()->lastInsertId();
    // }
}
