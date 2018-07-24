<?php

namespace Inviqa\Emarsys\Api\Request;

use Inviqa\Emarsys\Api\Client;
use Inviqa\Emarsys\Api\EmarsysResponseProvider;

class AccountSettingsProvider
{
    /**
     * @var EmarsysResponseProvider
     */
    private $emarsysResponseProvider;

    /**
     * @var Client
     */
    private $client;

    public function __construct(
        EmarsysResponseProvider $emarsysResponseProvider,
        Client $client
    ) {
        $this->emarsysResponseProvider = $emarsysResponseProvider;
        $this->client = $client;
    }

    public function fetchAccountSettings()
    {
        $settingsResponse = $this->client->requestAccountSettings();

        return $this->emarsysResponseProvider->provide($settingsResponse);
    }
}
