<?php declare(strict_types=1);

namespace App\Health\Application\CreateValue;

use App\Shared\Application\Command\CommandInterface;

final readonly class CreateValueCommand implements CommandInterface
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}
