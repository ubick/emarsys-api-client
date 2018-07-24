<?php

namespace Inviqa\Emarsys\Api\Client\Sales;

use GuzzleHttp\Client as GuzzleClient;
use Psr\Http\Message\ResponseInterface;

class SalesClient implements Client
{
    private $client;

    private $authenticationHeaderProvider;

    private $configuration;

    public function __construct(
        SalesAuthenticationHeaderProvider $authenticationHeaderProvider,
        SalesConfiguration $configuration
    ) {
        $this->authenticationHeaderProvider = $authenticationHeaderProvider;
        $this->configuration                = $configuration;
        $endPointUrl                        = sprintf($configuration->getEndpointUrl(), $configuration->getMerchantCode());
        $this->client                       = new GuzzleClient([
            'base_uri' => $endPointUrl,
        ]);
    }

    public function sendCSVContent(string $csvContent): ResponseInterface
    {
        $response = $this->client->post('api', [
            'headers'  => $this->headers(),
            'body' => \GuzzleHttp\Psr7\stream_for($csvContent),
        ]);

        return $response;
    }

    private function headers(): array
    {
        return [
            'Content-type' => 'text/csv',
            'Accept'       => 'text/plain'
        ];
    }
}
