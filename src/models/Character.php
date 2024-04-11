<?

declare(strict_types=1);

namespace Entities\Guild;

class Character{

    public function __construct(private int $id = 0,private string $archetype,private int $level){
        $this -> id = $id;
        $this -> archetype = $archetype;
        $this -> level = $level;
    }

    public function getId():int{
        return $this -> id;
    }

    public function setId(int $id){
        return $this -> id = $id;
    }

    public function getArchetype():string{
        return $this -> archetype;
    }

    public function setArchetype(string $archetype){
        return $this -> archetype = $archetype;
    }

    public function getLevel():int{
        return $this -> level;
    }

    public function setLevel(int $level){
        return $this -> level = $level;
    }

}