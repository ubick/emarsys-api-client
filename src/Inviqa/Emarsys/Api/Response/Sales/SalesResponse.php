<?php

namespace Inviqa\Emarsys\Api\Response\Sales;

class SalesResponse
{
    private $statusCode;

    private $statusText;

    public function __construct(
        string $statusCode,
        string $statusText
    ) {
        $this->statusCode = $statusCode;
        $this->statusText = $statusText;
    }

    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    public function getStatusText(): string
    {
        return $this->statusText;
    }
}
