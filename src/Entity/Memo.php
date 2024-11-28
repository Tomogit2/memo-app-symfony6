<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'memo')] 
class Memo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isImportant = false; // デフォルト値

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTime $createdAt = null;

    public function __construct()
{
    $this->createdAt = new \DateTime();
}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getIsImportant(): bool
    {
        return $this->isImportant;
    }

    public function setIsImportant(bool $isImportant): static
    {
        $this->isImportant = $isImportant;
        return $this;
    }

    public function getCreatedAt(): ?\DateTime
{
    return $this->createdAt;
}

public function setCreatedAt(\DateTime $createdAt): static
{
    $this->createdAt = $createdAt;
    return $this;
}

}
