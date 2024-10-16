<?php declare(strict_types=1);

namespace App\Health\Application\GetAllValues;

use App\Shared\Application\Query\QueryResponseInterface;

final class GetAllValuesQueryResponse implements QueryResponseInterface
{
    public function __construct(private array $values)
    {
    }

    public function values(): array
    {
        return $this->values;
    }
}
