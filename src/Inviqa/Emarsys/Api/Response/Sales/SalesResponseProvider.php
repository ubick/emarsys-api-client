<?php

namespace Inviqa\Emarsys\Api\Response\Sales;

use Psr\Http\Message\ResponseInterface;

class SalesResponseProvider
{
    public function provide(ResponseInterface $response): SalesResponse
    {
        $this->validate($response);

        return new SalesResponse(
            $response->getStatusCode(),
            $response->getReasonPhrase()
        );
    }

    private function validate(ResponseInterface $response)
    {
        if ($response->getStatusCode() != '200') {
            throw new \LogicException(
                sprintf(
                    'Cannot instantiate Sales Response object due an error in the request (Message: %s, Code: %s).',
                    $response->getReasonPhrase(),
                    $response->getStatusCode()
                )
            );
        }
    }
}
