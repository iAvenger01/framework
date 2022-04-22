<?php

namespace App\Validation\Validator\Page;

use App\Validation\Base\BaseValidator;
use App\Validation\Field;
use App\Validation\FieldValidator\{ValidatorBoolean, ValidatorDateTime, ValidatorName, ValidatorText};

class StoreValidator extends BaseValidator
{
    protected function fields(): void
    {
        $this->fields = [
            'name' => new Field(
                ValidatorName::class,
            ),
            'content' => new Field(
                ValidatorText::class
            ),
            'isActive' => new Field(
                ValidatorBoolean::class
            ),
            'createdAt' => new Field(
                ValidatorDateTime::class,
            ),
            'updatedAt' => new Field(
                ValidatorDateTime::class
            )
        ];
    }
}