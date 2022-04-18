<?php

namespace App\Http\Resource;

use App\Model\Model;

interface IResource
{
    public static function map(Model $resource): array;

    public static function collection(array $collections): array;
}