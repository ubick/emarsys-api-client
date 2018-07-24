<?php

namespace Inviqa\Emarsys\Api\Request\Accounts;

use Inviqa\Emarsys\Api\Client\Accounts\Client;
use Inviqa\Emarsys\Api\Response\Accounts\AccountsResponseProvider;

class AccountsSettingsProvider
{
    /**
     * @var AccountsResponseProvider
     */
    private $accountsResponseProvider;

    /**
     * @var Client
     */
    private $client;

    public function __construct(
        AccountsResponseProvider $emarsysResponseProvider,
        Client $client
    ) {
        $this->accountsResponseProvider = $emarsysResponseProvider;
        $this->client                   = $client;
    }

    public function fetchAccountSettings()
    {
        $settingsResponse = $this->client->requestAccountSettings();

        return $this->accountsResponseProvider->provide($settingsResponse);
    }
}
