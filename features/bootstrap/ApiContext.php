<?php

use Behat\Behat\Context\Context;
use Inviqa\Emarsys\Application;
use Inviqa\Emarsys\Api\Response\Accounts\AccountsResponse;
use Webmozart\Assert\Assert;

class ApiContext implements Context
{
    private $application;

    /**
     * @var AccountsResponse
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
     * @Then I should receive a successful response from the Settings endpoint
     */
    public function iShouldReceiveTheFollowingResponse()
    {
        Assert::isInstanceOf($this->response, AccountsResponse::class);

        Assert::eq($this->response->getReplyCode(), 0);
        Assert::eq($this->response->getReplyText(), 'OK');
    }

    /**
     * @When /^I send a CSV file to Emarsys$/
     */
    public function iSendACSVFileToEmarsys()
    {
        $this->response = $this->application->sendSalesDataViaCSV();
    }

    /**
     * @Then /^I should receive a successful response from the Sales endpoint$/
     */
    public function iShouldReceiveASuccessfulEmarsysResponse()
    {
        Assert::isInstanceOf($this->response, SalesResponse::class);

        Assert::eq($this->response->getReplyCode(), 200);
    }
}
