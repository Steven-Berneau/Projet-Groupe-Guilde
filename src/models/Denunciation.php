<?

declare(strict_types=1);

namespace Entities\Guild;

class Denunciation{

    public function __construct(private int $id = 0, protected DenunciationType $name = new DenunciationType())
    {
        $this -> id = $id;
        $this -> name = $name;
    }

    public function getId():int
    {
        return $this -> id;
    }

    public function setId(int $id)
    {
        return $this -> id = $id;
    }

    public function getName(): DenunciationType
    {
        return $this -> name;
    }

    public function setName(string $name)
    {
        return $this -> name = $name;
    }
}