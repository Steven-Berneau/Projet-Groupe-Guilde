<?php

declare(strict_types=1);

namespace App\Guild\Models;

class User
{
    /**
     * Simple first class User
     */

    public function __construct( private string $nickname = "", private string $email = "", private string $fname = "", private string $lname = "", private \DateTimeImmutable $birthdate, private int $id = 0)
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
    /**
     * Link with Database
     */
    public static function list(): Users
    {
        $list = new Users();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM User;');
        $statement->execute();
        while ($row = $statement->fetch()) {
            $list[] = new User(id: $row['id'], nickname: $row['nickname'], email: $row['email'], fname: $row['fname'], lname: $row['lname'], birthdate: $row['birthdate']);
        }
        return $list;
    }

    public static function filter(string $text): Users
    {
        $list = new Users();
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM User WHERE nickname like :textSearched;');
        $statement->execute(['textSearched' => '%' . $text . '%']);
        while ($row = $statement->fetch()) {
            $list[] = new User(id: $row['id'], nickname: $row['nickname'], email: $row['email'], fname: $row['fname'], lname: $row['lname'], birthdate: $row['birthdate']);
        }
        return $list;
    }
    /**
     * Starting CRUD
     */
    public static function read(int $id): ?User
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM User WHERE id=:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch())
            return new User(id: $row['id'], nickname: $row['nickname'], email: $row['email'], fname: $row['fname'], lname: $row['lname'], birthdate: $row['birthdate']);
        return NULL;
    }

    public static function create(User $user): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare('INSERT INTO User (nickname,email,fname,lname,birthdate) VALUES (:nickname, :email, :fname, :lname, :birthdate);');
        $statement->execute(['nickname' => $user->getNickname(), 'email' => $user->getEmail(), 'fname' => $user->getFname(), 'lname' => $user->getLname(), 'birthdate' => $user->getBirthdate()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function update(User $user)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE User SET  nickname=:nickname,email=:email,fname=:fname,lname=:lname,birthdate=:birthdate WHERE id=:id;');
        $statement->execute(['nickname' => $user->getNickname(), 'email' => $user->getEmail(), 'fname' => $user->getFname(), 'lname' => $user->getLname(), 'birthdate' => $user->getBirthdate()]);
    }

    public function delete(User $user)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM User WHERE id=:id');
        $statement->execute(['id' => $user->getId()]);
    }
}
