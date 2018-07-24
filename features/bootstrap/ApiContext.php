<?php

use Behat\Behat\Context\Context;
use Inviqa\Emarsys\Application;
use Inviqa\Emarsys\EmarsysResponse;
use Webmozart\Assert\Assert;

class ApiContext implements Context
{
    private $application;

    /**
     * @var EmarsysResponse
     */
    private $response;

    public function __construct()
    {
        $this->application = new Application();
    }

    /**
     * @When I retrieve the account settings from the Emarsys API endpoint
     */
    public function iRetrieveTheAccountSettingsFromTheEmarsysApiEndpoint()
    {
        $this->response = $this->application->retrieveAccountSettings();
    }

    /**
     * @Then I should receive a successful Emarsys response
     */
    public function iShouldReceiveTheFollowingResponse()
    {
        Assert::isInstanceOf($this->response, EmarsysResponse::class);

        Assert::eq($this->response->getReplyCode(), 0);
        Assert::eq($this->response->getReplyText(), 'OK');
    }
}
