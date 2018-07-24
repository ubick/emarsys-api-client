<?php

namespace spec\Inviqa\Emarsys\Api\Request;

use Inviqa\Emarsys\Api\Client;
use Inviqa\Emarsys\Api\EmarsysResponseProvider;
use Inviqa\Emarsys\EmarsysResponse;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountSettingsProviderSpec extends ObjectBehavior
{
    function let(
        EmarsysResponseProvider $emarsysResponseProvider,
        Client $client
    ) {
        $this->beConstructedWith($emarsysResponseProvider, $client);
    }

    function it_sets_up_the_account_settings_request(
        EmarsysResponseProvider $emarsysResponseProvider,
        Client $client
    ) {
        $json = <<< 'EOD'
{
  "replyCode": 0,
  "replyText": "OK"
}
EOD;

        $client->requestAccountSettings()->willReturn($json);
        $response = new EmarsysResponse(0, 'OK', []);
        $emarsysResponseProvider->provide($json)->willReturn($response);

        $this->fetchAccountSettings()->shouldBeLike($response);
    }
}
