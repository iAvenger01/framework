<?php

namespace App\Model;

class Page extends Model
{
    public string $name;

    public string $content;

    public \DateTimeInterface $createdAt;

    public \DateTimeInterface $updatedAt;
}