<?php declare(strict_types=1);

namespace App\Health\Infrastructure\Api;

use App\Health\Application\CreateValue\CreateValueCommand;
use App\Shared\Infrastructure\Api\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class CreateValueController extends AbstractApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $data = $this->getContentBody($request);

        $this->execute(new CreateValueCommand($data['value']));

        return new JsonResponse([
            'message' => 'create correctly',
        ]);
    }
}
