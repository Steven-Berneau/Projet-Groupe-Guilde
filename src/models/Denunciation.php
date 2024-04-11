<?

declare(strict_types=1);

namespace Entities\Guild;

class Denunciation{

    public function __construct(private int $id = 0, private string $name){
        $this -> _id = $id;
        $this -> _name = $name;
    }

    public function getId():int{
        return $this -> _id;
    }

    public function setId(int $id){
        return $this -> _id = $id;
    }

    public function getName():string{
        return $this -> _name;
    }

    public function setName(string $name){
        return $this -> _name = $name;
    }
}