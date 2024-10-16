<?php declare(strict_types=1);

namespace App\Health\Infrastructure\Api;

use App\Health\Application\GetAllValues\GetAllValuesQuery;
use App\Shared\Infrastructure\Api\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class GetAllValuesController extends AbstractApiController
{
    public function __invoke(): JsonResponse
    {
        $response = $this->ask(new GetAllValuesQuery());

        return new JsonResponse([
            'values' => $response->values(),
        ]);
    }
}
