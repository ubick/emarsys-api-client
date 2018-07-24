<?php

namespace Inviqa\Emarsys\Api;

use Inviqa\Emarsys\EmarsysResponse;

class EmarsysResponseProvider
{
    private const JSON_DECODING_ARRAY_FORMAT = true;

    /**
     * @throws \InvalidArgumentException
     */
    public function provide(string $json): EmarsysResponse
    {
        $response = json_decode($json, self::JSON_DECODING_ARRAY_FORMAT);

        $this->validate($response);

        return new EmarsysResponse(
            $response['replyCode'],
            $response['replyText'],
            $response['data']
        );
    }

    /**
     * @param mixed $response
     *
     * @throws \InvalidArgumentException
     */
    private function validate($response)
    {
        if (!is_array($response)) {
            throw new \InvalidArgumentException('Cannot instantiate Emarsys Response object due to an empty response body');
        }

        $fieldsToValidate = ['replyCode', 'replyText'];

        foreach ($fieldsToValidate as $fieldName) {
            $this->validateField($response, $fieldName);
        }
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function validateField(array $response, string $fieldName)
    {
        if (!array_key_exists($fieldName, $response)) {
            throw new \InvalidArgumentException(
                sprintf('Cannot instantiate Emarsys Response object because of the %s is missing from the response', $fieldName)
            );
        }
    }
}
