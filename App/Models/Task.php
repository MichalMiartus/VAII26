<?php

namespace App\Models;

use Framework\Core\Model;

class Task extends Model
{
    protected ?int $id = null;
    protected ?string $title = null;
    protected ?string $description = null;
    protected ?string $status = 'todo';
    protected ?string $priority = 'medium';
    protected ?string $due_date = null;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPriority(): string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): void
    {
        $this->priority = $priority;
    }

    public function getDueDate(): ?string
    {
        return $this->due_date;
    }

    public function setDueDate(?string $due_date): void
    {
        $this->due_date = $due_date;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}