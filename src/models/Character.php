<?

declare(strict_types=1);

namespace Entities\Guild;

class Character{

    private int $_id;
    private string $_archetype;
    private int $_level;

    public function __construct(int $id = 0, string $archetype, int $level){
        $this -> _id = $id;
        $this -> _archetype = $archetype;
        $this -> _level = $level;
    }

    public function getId():int{
        return $this -> _id;
    }

    public function setId():int{
        return $this -> _id = $id;
    }

    public function getArchetype():string{
        return $this -> _archetype;
    }

    public function setArchetype():string{
        return $this -> _archetype = $archetype;
    }

    public function getLevel():int{
        return $this -> _level;
    }

    public function setLevel():int{
        return $this -> _level = $level;
    }
    
}