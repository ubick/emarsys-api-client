<?php

namespace Inviqa\Emarsys\Api\Client\Sales;

interface SalesConfiguration
{
    public function isTestMode(): bool;

    public function getEndpointUrl(): string;

    public function getBearerToken(): string;

    public function getMerchantCode(): string;
}
