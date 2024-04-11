<?

declare(strict_types=1);

namespace Entities\Guild;

class User
{
    private int $_id;
    private string $_nickname;
    private string $_email;
    private string $_fname;
    private string $_lname;
    private \DateTimeImmutable $_birthdate;


    public function __construct(int $id = 0, string $nickname, string $email, string $fname, string $lname, \DateTimeImmutable $birthdate)
    {
        $this->_id = $id;
        $this->_nickname = $nickname;
        $this->_email = $email;
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_birthdate = $birthdate;
    }

    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id)
    {
        return $this->_id = $id;
    }

    public function getNickname(): string
    {
        return $this->_nickname;
    }

    public function setNickname(string $nickname)
    {
        return $this->_nickname = $nickname;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function setEmail(string $email)
    {
        return $this->_email = $email;
    }

    public function getFname(): string
    {
        return $this->_fname;
    }

    public function setFname(string $fname)
    {
        return $this->_fname = $fname;
    }

    public function getLname(): string
    {
        return $this->_lname;
    }

    public function setLname(string $lname)
    {
        return $this->_lname = $lname;
    }

    public function getBirthdate(): \DateTimeImmutable
    {
        return $this->_birthdate;
    }

    public function setBirthdate(string $birthdate)
    {
        return $this->_birthdate = $birthdate;
    }
}
