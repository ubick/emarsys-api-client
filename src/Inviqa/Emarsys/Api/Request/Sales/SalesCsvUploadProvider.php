<?php

namespace Inviqa\Emarsys\Api\Request\Sales;

use Inviqa\Emarsys\Api\Client\Sales\Client;
use Inviqa\Emarsys\Api\Response\Sales\SalesResponse;
use Inviqa\Emarsys\Api\Response\Sales\SalesResponseProvider;

class SalesCsvUploadProvider
{
    /**
     * @var SalesResponseProvider
     */
    private $salesResponseProvider;

    /**
     * @var Client
     */
    private $client;

    public function __construct(
        SalesResponseProvider $salesResponseProvider,
        Client $client
    ) {
        $this->salesResponseProvider = $salesResponseProvider;
        $this->client                = $client;
    }

    public function sendCsvContent(string $csvContent): SalesResponse
    {
        $salesResponse = $this->client->sendCSVContent($csvContent);
        return $this->salesResponseProvider->provide($salesResponse);
    }
}
