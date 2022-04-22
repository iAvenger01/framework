<?php

namespace App\Model;

class Page extends Model
{
    public string $name;

    public string $content;

    public bool $isActive;

    public \DateTimeInterface $createdAt;

    public \DateTimeInterface $updatedAt;
}