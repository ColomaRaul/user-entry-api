<?php declare(strict_types=1);

namespace App\Health\Application\GetAllValues;

use App\Health\Domain\ValuesService;
use App\Shared\Application\Query\QueryResponseInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class GetAllValuesQueryHandler
{
    public function __construct(private ValuesService $service)
    {
    }

    public function __invoke(GetAllValuesQuery $query): QueryResponseInterface
    {
        return new GetAllValuesQueryResponse($this->service->all());
    }
}
