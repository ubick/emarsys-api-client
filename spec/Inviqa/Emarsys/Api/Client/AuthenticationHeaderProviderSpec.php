<?php

namespace spec\Inviqa\Emarsys\Api\Client;

use Inviqa\Emarsys\Api\Client\AuthenticationHeaderProvider;
use Inviqa\Emarsys\Api\Client\EmarsysConfiguration;
use Inviqa\Emarsys\Api\Client\NonceGenerator;
use phpmock\prophecy\PHPProphet;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AuthenticationHeaderProviderSpec extends ObjectBehavior
{
    const GMDATE = '2018-07-23T16:06:53+00:00';
    const RANDOM_BYTES = '010101010';
    const BIN2HEX = 'asdfa3rasd';
    const SECRET = "testSecret";
    const USER = "testUser";

    private $nonce;

    function let(EmarsysConfiguration $configuration)
    {
        $this->beConstructedWith($configuration);

        $prophet = new PHPProphet();

        $gmdateMock = $prophet->prophesize('Inviqa\Emarsys\Api\Client');
        $gmdateMock->gmdate('c')->willReturn(self::GMDATE);
        $gmdateMock->reveal();

        $bin2hexMock = $prophet->prophesize('Inviqa\Emarsys\Api\Client');
        $bin2hexMock->bin2hex(Argument::any())->willReturn(self::BIN2HEX);
        $bin2hexMock->reveal();

        $this->nonce = self::BIN2HEX;
    }

    function it_builds_an_authentication_header(EmarsysConfiguration $configuration)
    {
        $configuration->getUsername()->willReturn(self::USER);
        $configuration->getSecret()->willReturn(self::SECRET);

        $passwordDigest = base64_encode(sha1($this->nonce. self::GMDATE . self::SECRET, false));

        $authHeader = sprintf(
            'UsernameToken Username="%s", PasswordDigest="%s", Nonce="%s", Created="%s"',
            self::USER,
            $passwordDigest,
            $this->nonce,
            self::GMDATE
        );

        $this->providerAuthenticationHeader()->shouldBe($authHeader);
    }
}
