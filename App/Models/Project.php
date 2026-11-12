<?php

namespace App\Models;

use Framework\Core\Model;

class Project extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $description = null;
    protected string $type = 'personal';
    protected ?string $created_at = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTasks(): array
    {
        return $this->getAllRelated(Task::class, 'project_id');
    }
}