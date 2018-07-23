<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use Inviqa\Emarsys\Application;
use Inviqa\Emarsys\EmarsysResponse;
use Webmozart\Assert\Assert;

class ApiContext implements Context
{
    private $application;

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
     * @Then I should receive the following Emarsys response
     */
    public function iShouldReceiveTheFollowingResponse(TableNode $table)
    {
        Assert::isInstanceOf($this->response, EmarsysResponse::class);
        throw new PendingException();
    }
}
