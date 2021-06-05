<?php declare(strict_types=1);

require_once 'ValidationResult.php';

class ParametersValidator
{
    public function getInputParameters(): ?string
    {
        return $GLOBALS['argv'][1] ?? null;
    }

    public function validate($parameter): ValidationResult
    {
        if ($parameter === null) {
            return ValidationResult::success();
        }

        if (!is_numeric($parameter)) {
            return ValidationResult::fail('Id работника должен быть числом.');
        }

        if ($parameter < 1) {
            return ValidationResult::fail('Id работника должен быть целым числом, большим нуля.');
        }

        return ValidationResult::success();
    }
}