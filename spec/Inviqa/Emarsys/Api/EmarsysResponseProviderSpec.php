<?php

namespace spec\Inviqa\Emarsys\Api;

use Inviqa\Emarsys\Api\EmarsysResponseProvider;
use Inviqa\Emarsys\EmarsysResponse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EmarsysResponseProviderSpec extends ObjectBehavior
{
    function it_should_build_an_emarsys_response_class()
    {
        $json = <<< 'EOD'
{
  "replyCode": 0,
  "replyText": "OK",
  "data": {
    "environment": "suite.emarsys.com",
    "timezone": "America/New_York",
    "name": "Heimdall",
    "password_history_queue_size": 3,
    "country": "United States of America"
  }
}
EOD;

        $expectedEmarsysResponse = new EmarsysResponse(
            '0',
            'OK',
            [
                'environment'                 => 'suite.emarsys.com',
                'timezone'                    => 'America/New_York',
                'name'                        => 'Heimdall',
                'password_history_queue_size' => 3,
                'country'                     => 'United States of America'
            ]
        );

        $this->provide($json)->shouldBeLike($expectedEmarsysResponse);
    }

    function it_should_throw_exception_when_data_is_missing()
    {
        $json = <<< 'EOD'
{
  "replyText": "OK",
  "data": {
    "environment": "suite.emarsys.com",
    "timezone": "America/New_York",
    "name": "Heimdall",
    "password_history_queue_size": 3,
    "country": "United States of America"
  }
}
EOD;
        $this->shouldThrow(new \InvalidArgumentException('Cannot instantiate Emarsys Response object because of the replyCode is missing from the response'))->duringProvide($json);

        $json = <<< 'EOD'
{
  "replyCode": "0",
  "data": {
    "environment": "suite.emarsys.com",
    "timezone": "America/New_York",
    "name": "Heimdall",
    "password_history_queue_size": 3,
    "country": "United States of America"
  }
}
EOD;
        $this->shouldThrow(new \InvalidArgumentException('Cannot instantiate Emarsys Response object because of the replyText is missing from the response'))->duringProvide($json);
    }

    function it_should_throw_an_exception_when_the_json_cannot_be_decoded()
    {
        $json = "";

        $this->shouldThrow(new \InvalidArgumentException('Cannot instantiate Emarsys Response object due to an empty response body'))->duringProvide($json);
    }
}
