<?
declare(strict_types=1);

namespace Entities\Guild;

class Message
{
    public function __construct(private int $id = 0, private string $content = '', private \DateTimeImmutable $date = new \DateTimeImmutable('now') )
    {
        $this->id = $id; // Attribution de la valeur de $id à la propriété $id de l'objet
        $this->content = $content; // Attribution de la valeur de $content à la propriété $content de l'objet
        
        // Attribution de la valeur de $date à la propriété $date de l'objet
        // Si $date est null, une nouvelle instance de DateTimeImmutable est créée avec la date et l'heure actuelles
        $this->date = $date ?: new \DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id; 
    }

    public function getContent(): string
    {
        return $this->content; 
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date; 
    }
}
