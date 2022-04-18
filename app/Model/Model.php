<?php

namespace App\Model;

use ReflectionClass;

class Model
{
    public function toArray(): array {
        $reflectionClass = new ReflectionClass($this);
        $properties = [];
        foreach ($reflectionClass->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();
            $result[$propertyName] = $this->{$propertyName};
        }

        return $properties;
    }

    public function fill(array $parameters): void {
        foreach ($parameters as $key => $parameter) {
            $this->{$key} = $parameter;
        }
    }

    public static function create($parameters): static {
        $model = new static();
        $model->fill($parameters);

        return $model;
    }
}