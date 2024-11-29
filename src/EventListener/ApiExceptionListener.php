<?php declare(strict_types=1);

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\KernelInterface;
use function Symfony\Component\String\s;

final readonly class ApiExceptionListener
{
    public function __construct(
        private LoggerInterface $logger,
        private KernelInterface $kernel,
    )
    {
    }

    #[AsEventListener(event: KernelEvents::EXCEPTION)]
    public function onKernelException(ExceptionEvent $event): void
    {
        if (s($event->getRequest()->getPathInfo())->startsWith('/api/v')) {
            $throwable = $event->getThrowable();
            $errorArray = [
                "message" => $throwable->getMessage(),
                "file" => $throwable->getFile(),
                "line" => $throwable->getLine(),
                "code" => $throwable->getCode(),
                "trace" => $throwable->getTrace(),
            ];

            if ($throwable instanceof HttpExceptionInterface) {
                $code = $throwable->getStatusCode();
            } else {
                $code = 500;
            }

            if ($this->kernel->isDebug()) {
                $event->setResponse(new JsonResponse($errorArray, status: $code));
            } else {
                $this->logger->error(json_encode($errorArray));
                $event->setResponse(new JsonResponse(array_filter($errorArray, fn(string $key): bool => $key === 'message', ARRAY_FILTER_USE_KEY), status: $code));
            }
        }
    }
}
