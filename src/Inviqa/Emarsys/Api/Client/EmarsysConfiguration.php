<?php

namespace Inviqa\Emarsys\Api\Client;

interface EmarsysConfiguration
{
    public function isTestMode(): bool;

    public function getEndpointUrl(): string;

    public function getUsername(): string;

    public function getSecret(): string;
}
