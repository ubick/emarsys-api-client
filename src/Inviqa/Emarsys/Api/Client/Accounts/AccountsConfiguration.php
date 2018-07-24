<?php

namespace Inviqa\Emarsys\Api\Client\Accounts;

interface AccountsConfiguration
{
    public function isTestMode(): bool;

    public function getEndpointUrl(): string;

    public function getUsername(): string;

    public function getSecret(): string;
}
