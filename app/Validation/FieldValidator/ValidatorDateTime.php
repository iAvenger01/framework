<?php

namespace App\Validation\FieldValidator;

use App\Validation\Rule\RuleDateTime;
use App\Validation\Rule\RuleString;
use App\Validation\Transformer\TransformerDateTime;

class ValidatorDateTime extends \App\Validation\Base\BaseFieldValidator
{
    public function actions(array $rules): array
    {
        return [
            new RuleString(),
            new TransformerDateTime(),
            new RuleDateTime()
        ];
    }
}