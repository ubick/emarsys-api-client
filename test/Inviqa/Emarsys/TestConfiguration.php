<?php

namespace test\Inviqa\Emarsys;

use Inviqa\Emarsys\Api\Client\EmarsysConfiguration;

class TestConfiguration implements EmarsysConfiguration
{

    public function isTestMode(): bool
    {
        return true;
    }

    public function getEndpointUrl(): string
    {
        return "";
    }

    public function getUsername(): string
    {
        return "";
    }

    public function getSecret(): string
    {
        return "";
    }
}
