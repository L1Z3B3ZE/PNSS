<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class BirthDateValidator extends AbstractValidator
{
    protected string $message = 'Дата рождения :field не может быть больше текущей даты';

    public function rule(): bool
    {
        $date = new \DateTime($this->value);
        $now = new \DateTime();

        return $date <= $now;
    }
}
