<?php
declare(strict_types=1);

namespace App\Event\Listener;

use App\Controller\AbstractController;
use App\Exception\AbstractApiException;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Throwable;

class ExceptionListener
{
    private LoggerInterface $logger;

    /**
     * ExceptionListener constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        if ($event->getThrowable() instanceof AbstractApiException) {
            $response = $this->handleKnownExceptions($event->getThrowable());
        } else {
            $response = $this->handleUnknownExceptions($event->getThrowable());
        }

        $event->setResponse($response);
    }

    /**
     * @param Throwable $exception
     * @return JsonResponse
     */
    private function handleKnownExceptions(Throwable $exception): JsonResponse
    {
        $header = [];

        if (Response::HTTP_BAD_REQUEST === $exception->getStatusCode()) {
            $header = ['Content-Type' => AbstractController::REQUEST_CONTENT_TYPE];
        } else {
            $this->logger->error($exception);
        }

        $data = ['errorMessage' => $exception->getMessage()];

        return new JsonResponse($data, $exception->getStatusCode(), $header);
    }

    /**
     * @param Throwable $exception
     * @return JsonResponse
     */
    private function handleUnknownExceptions(Throwable $exception): JsonResponse
    {
        $this->logger->error($exception);

        $data = ['errorMessage' => $exception->getMessage()];
        return new JsonResponse($data, Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}