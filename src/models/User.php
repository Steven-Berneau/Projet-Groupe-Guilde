<?php

declare(strict_types=1);

namespace Entities\Guild;

class User
{
    /**
     * Simple first class User
     */
    public function __construct(private int $id = 0, private string $nickname = "FreeZyBabe", private string $email = "", private string $fname = "", private string $lname = "", private \DateTimeImmutable $birthdate = new \DateTimeImmutable())
    {
        $this->id = $id;
        $this->nickname = $nickname;
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->birthdate = $birthdate;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getNickname(): string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname)
    {
        return $this->nickname = $nickname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        return $this->email = $email;
    }

    public function getFname(): string
    {
        return $this->fname;
    }

    public function setFname(string $fname)
    {
        return $this->fname = $fname;
    }

    public function getLname(): string
    {
        return $this->lname;
    }

    public function setLname(string $lname)
    {
        return $this->lname = $lname;
    }

    public function getBirthdate(): \DateTimeImmutable
    {
        return $this->birthdate;
    }

    public function setBirthdate(string $birthdate)
    {
        return $this->birthdate = $birthdate;
    }
    public static function read(int $id): ?User
    {
        $statement = Database::getInstance()->getConnexion()->prepare('select * from User where id =:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch()) {
            $user = new User(id: $row['id'], nickname: $row['nickname'], email: $row['email'], fname: $row['fname'], lname: $row['lname'], birthDate: $row['birthDate'], numAPI_key: $row['num_API_key'], numCharacter: $row['numCharacter'], numRank: $row['numRank'], numDenunciation: $row['numDenunciation']);

            return $user;
        }
        return null;
    }
}
