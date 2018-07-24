<?php

namespace Inviqa\Emarsys;

use Inviqa\Emarsys\Api\Client\Accounts\AccountsAuthenticationHeaderProvider;
use Inviqa\Emarsys\Api\Client\Accounts\AccountsClient;
use Inviqa\Emarsys\Api\Client\Sales\SalesAuthenticationHeaderProvider;
use Inviqa\Emarsys\Api\Client\Sales\SalesClient;
use Inviqa\Emarsys\Api\Request\Sales\SalesCsvUploadProvider;
use Inviqa\Emarsys\Api\Response\Accounts\AccountsResponseProvider;
use Inviqa\Emarsys\Api\Request\Accounts\AccountsSettingsProvider;
use Inviqa\Emarsys\Api\Response\Sales\SalesResponseProvider;
use test\Inviqa\Emarsys\Accounts\TestConfiguration as AccountsTestConfiguration;
use test\Inviqa\Emarsys\Sales\TestConfiguration as SalesTestConfiguration;

class Application
{
    public function retrieveAccountSettings()
    {
        $accountsResponseProvider = new AccountsResponseProvider();
        $configuration = new AccountsTestConfiguration();
        $authenticationHeaderProvider = new AccountsAuthenticationHeaderProvider($configuration);
        $client = new AccountsClient($authenticationHeaderProvider, $configuration);
        $accountSettingsProvider = new AccountsSettingsProvider($accountsResponseProvider, $client);
        return $accountSettingsProvider->fetchAccountSettings();
    }

    public function sendSalesDataViaCSV()
    {
        $salesResponseProvider = new SalesResponseProvider();
        $configuration = new SalesTestConfiguration();
        $authenticationHeaderProvider = new SalesAuthenticationHeaderProvider($configuration);
        $client = new SalesClient($authenticationHeaderProvider, $configuration);
        $salesSettingsProvider = new SalesCsvUploadProvider($salesResponseProvider, $client);
        return $salesSettingsProvider->sendCsvContent($csvContent);
    }
}
