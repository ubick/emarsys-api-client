<?php

namespace Inviqa\Emarsys;

use Inviqa\Emarsys\Api\Client\AuthenticationHeaderProvider;
use Inviqa\Emarsys\Api\Client\EmarsysClient;
use Inviqa\Emarsys\Api\EmarsysResponseProvider;
use Inviqa\Emarsys\Api\Request\AccountSettingsProvider;
use test\Inviqa\Emarsys\TestConfiguration;

class Application
{
    private $accountSettingsProvider;

    public function __construct()
    {
        $emarsysResponseProvider = new EmarsysResponseProvider();
        $configuration = new TestConfiguration();
        $authenticationHeaderProvider = new AuthenticationHeaderProvider($configuration);
        $client = new EmarsysClient($authenticationHeaderProvider, $configuration);
        $this->accountSettingsProvider = new AccountSettingsProvider($emarsysResponseProvider, $client);
    }

    public function retrieveAccountSettings()
    {
        return $this->accountSettingsProvider->fetchAccountSettings();
    }
}
