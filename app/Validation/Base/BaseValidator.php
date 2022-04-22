<?php

namespace App\Validation\Base;

use App\Validation\Field;
use App\Validation\Rule\Base\Rule;

abstract class BaseValidator implements IBaseValidator
{
    /**
     * @var Field[]
     */
    protected array $fields;

    protected array $requestData;

    protected array $validatedData;

    protected array $errors;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
        $this->errors = [];
        $this->validatedData = [];
        $this->fields();
    }

    abstract protected function fields(): void;

    public function validate(): bool
    {
        foreach ($this->fields as $key => $field) {
            if (isset($this->requestData[$key])) {
                $value = $this->requestData[$key];
                if($field->validator->validate($value)) {
                    $this->validatedData[$key] = $value;
                } else {
                    $this->errors[$key] = $field->validator->errors;
                }
            } else {
                if ($field->isRequired) {
                    $this->errors[$key] = [Rule::ERR_EMPTY];
                }
            }
        }
        return count($this->errors) === 0;
    }

    public function getErrors(): array {
        return $this->errors;
    }

    public function validated(): array {
        return $this->validatedData;
    }
}