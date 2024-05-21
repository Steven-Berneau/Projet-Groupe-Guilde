<?

declare(strict_types=1);

namespace App\Guild\Models;

class Denunciation
{

    public function __construct(private int $id = 0, protected DenunciationType $name = new DenunciationType())
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        return $this->id = $id;
    }

    public function getName(): DenunciationType
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        return $this->name = $name;
    }

    public static function read(int $id): ?Denunciation
    {
        $statement = Database::getInstance()->getConnexion()->prepare('SELECT * FROM Denunciation WHERE id=:id;');
        $statement->execute(['id' => $id]);
        if ($row = $statement->fetch())
            return new Denunciation(id: $row['id'], name: $row['name']);
        return NULL;
    }

    public static function create(Denunciation $denunciation): int
    {
        $statement = Database::getInstance()->getConnexion()->prepare('INSERT INTO Denunciation (name) VALUES (:name);');
        $statement->execute(['name' => $denunciation->getName()]);
        return (int)Database::getInstance()->getConnexion()->lastInsertId();
    }

    public static function update(Denunciation $denunciation)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('UPDATE Denunciation SET name=:name WHERE id=:id;');
        $statement->execute(['name' => $denunciation->getName()]);
    }

    public static function delete(Denunciation $denunciation)
    {
        $statement = Database::getInstance()->getConnexion()->prepare('DELETE FROM Denunciation WHERE id=:id;');
        $statement->execute(['id' => $denunciation->getId()]);
    }
}
