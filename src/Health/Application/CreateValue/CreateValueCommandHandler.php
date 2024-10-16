<?php declare(strict_types=1);

namespace App\Health\Application\CreateValue;

use App\Health\Domain\ValuesService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class CreateValueCommandHandler
{
    public function __construct(private ValuesService $createValueService)
    {
    }

    public function __invoke(CreateValueCommand $command): void
    {
        $this->createValueService->add($command->value());
    }
}
