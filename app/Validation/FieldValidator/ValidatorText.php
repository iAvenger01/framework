<?php

namespace App\Validation\FieldValidator;

use App\Validation\Base\BaseFieldValidator;
use App\Validation\Rule\RuleString;

class ValidatorText extends BaseFieldValidator
{
    public function actions(array $rules): array
    {
        return [
            new RuleString($rules)
        ];
    }
}