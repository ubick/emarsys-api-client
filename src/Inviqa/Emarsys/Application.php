<?php

namespace Inviqa\Emarsys;

use Inviqa\Emarsys\Api\Client\EmarsysClient;
use Inviqa\Emarsys\Api\EmarsysResponseProvider;
use Inviqa\Emarsys\Api\Request\AccountSettingsProvider;

class Application
{
    private $accountSettingsProvider;

    public function __construct()
    {
        $emarsysResponseProvider = new EmarsysResponseProvider();
        $client = new EmarsysClient();
        $this->accountSettingsProvider = new AccountSettingsProvider($emarsysResponseProvider, $client);
    }

    public function retrieveAccountSettings()
    {
        return $this->accountSettingsProvider->fetchAccountSettings();
    }
}
