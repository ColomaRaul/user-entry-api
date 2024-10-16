<?php declare(strict_types=1);

namespace App\Health\Domain;

final class ValuesService
{
    private array $valuesInMemory = [];

    public function add(string $value): void
    {
        $this->valuesInMemory[] = $value;
    }

    public function all(): array
    {
        return $this->valuesInMemory;
    }
}
