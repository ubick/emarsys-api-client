<?php

namespace Inviqa\Emarsys\Api\Client\Sales;

use Psr\Http\Message\ResponseInterface;

interface Client
{
    public function sendCSVContent(string $csvContent): ResponseInterface;
}
