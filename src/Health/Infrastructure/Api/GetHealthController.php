<?php declare(strict_types=1);

namespace App\Health\Infrastructure\Api;

use App\Health\Application\GetHealth\GetHealthQuery;
use App\Shared\Infrastructure\Api\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

final class GetHealthController extends AbstractApiController
{
    /**
     * @throws Throwable
     */
    public function __invoke(): JsonResponse
    {
        $response = $this->ask(new GetHealthQuery());

        return new JsonResponse([
            'status' => $response->status(),
        ]);
    }
}
