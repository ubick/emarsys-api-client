<?php

namespace Inviqa\Emarsys\Api\Client\Accounts;

class AccountsAuthenticationHeaderProvider
{
    private $configuration;

    public function __construct(AccountsConfiguration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function providerAuthenticationHeader()
    {
        $nonce = bin2hex(random_bytes(32));
        $user = $this->configuration->getUsername();
        $secret = $this->configuration->getSecret();

        $timestamp = gmdate('c');
        $passwordDigest = base64_encode(sha1($nonce . $timestamp . $secret, false));

        return sprintf(
            'UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',
            $user,
            $passwordDigest,
            $nonce,
            $timestamp
        );
    }
}
