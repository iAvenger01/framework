<?php

namespace App\Validation\Rule;

use App\Validation\Rule\Base\Rule;

class RuleString extends Rule
{

    public function validate(mixed $value): bool
    {
        $result = is_string($value);

        if (!$result) {
            $this->message = Rule::ERR_EMPTY;
        }
        return $result;
    }
}