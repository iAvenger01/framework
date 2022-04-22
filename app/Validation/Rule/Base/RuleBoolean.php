<?php

namespace App\Validation\Rule\Base;

class RuleBoolean extends Rule
{
    private const _VALUE_IS_NOT_BOOLEAN = 'Значение не является булевым';

    public function validate(mixed $value): bool
    {
        $result =  is_bool($value);

        if (!$result) {
            $this->message = self::_VALUE_IS_NOT_BOOLEAN;
        }
        return $result;
    }
}