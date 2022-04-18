<?php

namespace App\Validation\Page;

use App\Validation\Base\BaseValidator;
use App\Validation\Field;
use App\Validation\FieldValidator\{ValidatorDateTime, ValidatorName, ValidatorText};

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
            'startedAt' => new Field(
                ValidatorDateTime::class
            ),
            'updatedAt' => new Field(
                ValidatorDateTime::class
            )
        ];
    }
}