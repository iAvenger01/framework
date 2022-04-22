<?php

namespace App\Validation\FieldValidator;

use App\Validation\Base\BaseFieldValidator;
use App\Validation\Rule\Base\RuleBoolean;
use App\Validation\Transformer\TransformerBoolean;

class ValidatorBoolean extends BaseFieldValidator
{

    public function actions(array $rules): array
    {
        return [
            new TransformerBoolean(),
            new RuleBoolean()
        ];
    }
}