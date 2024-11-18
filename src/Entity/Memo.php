<?php

namespace App\Entity;

use App\Repository\MemoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemoRepository::class)]
class Memo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Memo = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemo(): ?string
    {
        return $this->Memo;
    }

    public function setMemo(string $Memo): static
    {
        $this->Memo = $Memo;

        return $this;
    }
}
