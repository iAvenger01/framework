<?php

namespace App\Validation\Base;

abstract class BaseFieldValidator implements IBaseFieldValidator
{
    /**
     * @var IAction[]
     */
    protected array $actions;

    public array $errors = [];

    public function __construct($rules)
    {
        $this->actions = $this->actions($rules);
    }

    /**
     * @throws \Exception
     */
    public function validate(&$value): bool
    {
        $resultAll = true;
        foreach ($this->actions as $action) {
            $actionAdapter = new ActionAdapter($action);
            $result = $actionAdapter->run($value);
            $value = $actionAdapter->mutatedValue;

            if (!$result) {
                $this->errors[] = $actionAdapter->error;
            }

            $resultAll = $resultAll && $result;
        }
        return $resultAll;
    }

    abstract public function actions(array $rules): array;
}