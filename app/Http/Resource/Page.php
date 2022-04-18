<?php

namespace App\Http\Resource;

use App\Model\Model;
use App\Model\Page as PageModel;
use JetBrains\PhpStorm\ArrayShape;

class Page implements IResource
{
    #[ArrayShape(['name' => "string", 'content' => "string"])]
    public static function map(PageModel|Model $resource): array {
        return [
            'name' => $resource->name,
            'content' => $resource->content
        ];
    }

    public static function collection(array $collections): array {
        return array_map([self::class, 'map'], $collections);
    }
}