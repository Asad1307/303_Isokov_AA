<?php declare(strict_types=1);

class EventViewModel
{
    public int $id;
    public string $surname;
    public string $name;
    public ?string $patronymic;
    public string $serviceExecutionTime;
    public string $nameOfService;
    public float $price;
}