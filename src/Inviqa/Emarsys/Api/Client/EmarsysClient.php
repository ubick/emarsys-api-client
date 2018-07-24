<?php

namespace Inviqa\Emarsys\Api\Client;

use GuzzleHttp\Client as GuzzleClient;
use Inviqa\Emarsys\Api\Client;

class EmarsysClient implements Client
{
    private $client;

    public function __construct(EmarsysConfiguration $configuration)
    {
        $this->client = new GuzzleClient([
            'base_uri' => $configuration->getEndpointUrl(),
        ]);
    }

    public function requestAccountSettings()
    {
        $response = $this->client->get('settings', [
            'headers' => $this->headers(),
        ]);

        return (string) $response->getBody()->getContents();
    }

    private function headers(): array
    {
        return [
            'Content-type' => 'application/json; charset="utf-8"',
            'X-WSSE' => $this->getAuthenticationHeader(),
        ];
    }

    private function getAuthenticationHeader(): string
    {
        $nonce = bin2hex(random_bytes(32));
        $user = '';
        $secret = '';

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
