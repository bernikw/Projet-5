<?php

declare(strict_types=1);

namespace App\Model\Entity;

use App\Model\Entity\Interfaces\EntityObjectInterface;

final class Post
{
    private int $id;
    private string $title;
    private string $chapo;
    private string $content;
    private ?string $dateCreation;
    private ?string $dateUpdate;
    private int $userId;
    private string $username;
 

    public function __construct(int $id, string $title, string $chapo, string $content, ?string $dateCreation, ?string $dateUpdate, int $userId, string $username)
    {
        $this->id = $id;
        $this->title = $title;
        $this->chapo = $chapo;
        $this->content = $content;
        $this->dateCreation = $dateCreation;
        $this->dateUpdate = $dateUpdate;
        $this->userId = $userId;
        $this->username = $username;
        
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getChapo(): string
    {
        return $this->chapo;
    }

    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }

    public function setDateCreation(string $dateCreation): self
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }

    public function getDateUpdate(): string
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(string $dateUpdate = null): self
    {
        $this->dateUpdate = $dateUpdate;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(int $username): self
    {
        $this->username = $username;
        return $this;
    }
   
}
