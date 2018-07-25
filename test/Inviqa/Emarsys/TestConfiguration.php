<?php

namespace test\Inviqa\Emarsys;

use Inviqa\Emarsys\Api\Configuration;

class TestConfiguration implements Configuration
{
    private $isTestMode;
    private $endPointUrl;
    private $salesEndPointUrl;
    private $username;
    private $secret;
    private $bearerToken;
    private $merchantCode;

    public function __construct(array $params = [])
    {
        $this->isTestMode = $params['isTestMode'] ?? true;
        $this->endPointUrl = $params['endPointUrl'] ?? '';
        $this->salesEndPointUrl = $params['salesEndPointUrl'] ?? '';
        $this->username = $params['username'] ?? '';
        $this->secret = $params['secret'] ?? '';
        $this->bearerToken = $params['bearerToken'] ?? '';
        $this->merchantCode = $params['merchantCode'] ?? '';
    }

    public function isTestMode(): bool
    {
        return $this->isTestMode;
    }

    public function getEndPointUrl(): string
    {
        return $this->endPointUrl;
    }

    public function getSalesEndPointUrl(): string
    {
        return $this->salesEndPointUrl;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getSecret(): string
    {
        return $this->secret;
    }

    public function getBearerToken(): string
    {
        return $this->bearerToken;
    }

    public function getMerchantCode(): string
    {
        return $this->merchantCode;
    }
}
