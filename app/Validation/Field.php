<?php

namespace App\Validation;

use App\Validation\Base\IBaseFieldValidator;

class Field
{
    public IBaseFieldValidator $validator;

    public bool $isRequired;

    public function __construct(
        string $validatorClass,
        ?array $validatorRules = [],
        bool $isRequired = true
    )
    {
        $this->validator = new $validatorClass($validatorRules);
        $this->isRequired = $isRequired;
    }
}