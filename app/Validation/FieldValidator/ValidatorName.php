<?php

namespace App\Validation\FieldValidator;

use App\Validation\Base\BaseFieldValidator;
use App\Validation\Rule\RuleString;

class ValidatorName extends BaseFieldValidator
{
    public function actions($rules): array
    {
        return [
            new RuleString($rules)
        ];
    }
}