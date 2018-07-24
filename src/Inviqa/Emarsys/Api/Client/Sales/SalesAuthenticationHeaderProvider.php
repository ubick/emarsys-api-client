<?php

namespace Inviqa\Emarsys\Api\Client\Sales;

class SalesAuthenticationHeaderProvider
{
    private $configuration;

    public function __construct(SalesConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function providerAuthenticationHeader()
    {
        $bearerToken = $this->configuration->getBearerToken();

        return sprintf(
            'Authorization: Bearer %s',
            $bearerToken
        );
    }
}
