<?php

namespace Inviqa\Emarsys\Api\Client;

use GuzzleHttp\Client as GuzzleClient;
use Inviqa\Emarsys\Api\Client;

class EmarsysClient implements Client
{
    private $client;
    private $authenticationHeaderProvider;
    private $configuration;

    public function __construct(
        AuthenticationHeaderProvider $authenticationHeaderProvider,
        EmarsysConfiguration $configuration
    ) {
        $this->authenticationHeaderProvider = $authenticationHeaderProvider;
        $this->configuration = $configuration;
        $this->client = new GuzzleClient([
            'base_uri' => $configuration->getEndpointUrl(),
        ]);
    }

    public function requestAccountSettings()
    {
        $response = $this->client->get('settings', [
            'headers' => $this->headers(),
        ]);

        return (string) $response->getBody()->getContents();
    }

    private function headers(): array
    {
        return [
            'Content-type' => 'application/json; charset="utf-8"',
            'X-WSSE' => $this->authenticationHeaderProvider->providerAuthenticationHeader(),
        ];
    }
}
