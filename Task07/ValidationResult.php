<?php declare(strict_types=1);

class ValidationResult
{
    public bool $success;
    public ?string $message;

    private function __construct(bool $success, ?string $message)
    {
        $this->success = $success;
        $this->message = $message;
    }

    public static function success(string $message = null): self
    {
        return new self(true, $message);
    }

    public static function fail(string $message = null): self
    {
        return new self(false, $message);
    }
}