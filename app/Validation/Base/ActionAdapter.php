<?php

namespace App\Validation\Base;

use App\Validation\Rule\Base\IRule;
use Exception;

class ActionAdapter
{
    public mixed $mutatedValue;
    private IAction $_action;
    public string $error;

    public function __construct(IAction $action)
    {
        $this->_action = $action;
    }

    /**
     * @throws Exception
     */
    public function run(mixed $value): bool
    {
        $result = true;
        $classImplements = class_implements($this->_action);

        if (in_array(IRule::class, $classImplements, true)) {
            $result = $this->_action->validate($value);
            $this->mutatedValue = $value;
            if (!$result) {
                $this->error = $this->_action->message;
            }
        } else if (in_array(ITransformer::class, $classImplements, true)) {
            $this->mutatedValue = $this->_action->transform($value);
        }
        else {
            throw new Exception("Данный тип действия не поддерживается");
        }

        return $result;
    }
}