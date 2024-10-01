<?php declare(strict_types=1);

namespace App\Shared\Infrastructure\Api;

use App\Shared\Application\Command\CommandInterface;
use App\Shared\Application\Query\QueryInterface;
use App\Shared\Application\Query\QueryResponseInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

abstract class AbstractApiController extends AbstractController
{
    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @throws Throwable
     */
    protected function ask(QueryInterface $query): QueryResponseInterface
    {
        try {
            return $this->handle($query);
        } catch (Throwable $e) {
            while ($e instanceof HandlerFailedException) {
                $e = $e->getPrevious();
            }

            throw $e;
        }
    }

    /**
     * @throws Throwable
     */
    protected function execute(CommandInterface $command): void
    {
        try {
            $this->handle($command);
        } catch (Throwable $e) {
            while ($e instanceof HandlerFailedException) {
                $e = $e->getPrevious();
            }

            throw $e;
        }
    }
}
